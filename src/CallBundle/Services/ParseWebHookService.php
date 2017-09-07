<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 15:43
 */

namespace CallBundle\Services;


use CallBundle\Entity\Action;
use CallBundle\Entity\Agent;
use CallBundle\Entity\Call;
use CallBundle\Entity\Queue;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Logger;
use Symfony\Bundle\TwigBundle\TwigEngine;

class ParseWebHookService
{
    /** @var EntityManagerInterface $em */
    private $em;

    /** @var Logger $logger */
    private $logger;

    /** @var \Swift_Mailer $mailer */
    private $mailer;

    /** @var TwigEngine $templating */
    private $templating;

    /** @var ThuliumService $thulium */
    private $thulium;

    public function __construct(EntityManagerInterface $entityManager,Logger $logger,\Swift_Mailer $mailer,TwigEngine $twigEngine,ThuliumService $thulium)
    {
        $this->em = $entityManager;
        $this->logger = $logger;
        $this->mailer = $mailer;
        $this->templating = $twigEngine;
        $this->thulium = $thulium;

    }

    public function parseWebHook($webhook)
    {
        $call = new Call();

        if (isset($webhook['action'])){
            $action = $this->em->getRepository("CallBundle:Action")->findOneBy([
                "action" => $webhook['action']
            ]);
            if (!$action){
                $action = new Action();
                $action->setAction($webhook['action']);

                $this->em->persist($action);
                $this->em->flush();
            }

            $webhook['action'] = $action;
        }

        if (isset($webhook['queue_id'])){
            $queue = $this->em->getRepository("CallBundle:Queue")->findOneBy([
                "queue" => $webhook['queue_id']
            ]);
            if (!$queue){
                $team = $this->em->getRepository('CallBundle:Team')->find(1);
                $queue = new Queue();
                $queue->setQueue($webhook['queue_id']);
                $queue->setTeam($team);

                $this->em->persist($queue);
                $this->em->flush();
            }
            unset($webhook['queue_id']);
            $webhook['queue'] = $queue;
        }

        if (isset($webhook['agent_login'])){
            $agent = $this->em->getRepository("CallBundle:Agent")->findOneBy([
                "thulium_login" => $webhook['agent_login']
            ]);
            if (!$agent){
                $team = $this->em->getRepository("CallBundle:Team")->find("1");
                $agent = new Agent();
                $agent->setTeam($team);
                $agent->setThuliumLogin($webhook['agent_login']);
                $agent_login = $webhook['agent_login'];

                $agent->setFullname($this->getName($agent_login));
                $agent->setFirstname($this->getFirstName($agent_login));
                $agent->setLastname($this->getLastName($agent_login));
                $agentThuliumInfo = $this->thulium->getAgentInfo($agent_login);
                $agent->setSip(100 + $agentThuliumInfo['number']);

                if (isset($queue)){
                    $agent->addQueue($queue);
                    $queue->addAgent($agent);
                }

                $this->em->persist($agent);
                $this->em->flush();
            }

            unset($webhook['agent_login']);
            $webhook['agent'] = $agent;
        }

        foreach ($webhook as $key => $value){
            $setFunction = $this->createSetFunction($key);
            if (method_exists($call,$setFunction)) {
                call_user_func([$call, $setFunction], $value);
            }else{
                $unknowFields[] = [$key => $value];
            }
        }

        if (!empty($unknowFields)){
            $call->setUnknowField(json_encode($unknowFields));
            $this->sendMail(json_encode($unknowFields));
        }

        $this->em->persist($call);
        $this->em->flush();

    }

    private function createSetFunction($key)
    {
        $parts = explode("_",$key);
        foreach ($parts as $key => $part){
            $parts[$key] = ucfirst($part);
        }
        $key = implode("",$parts);

        return "set$key";
    }

    public function getName($agent_login)
    {
        return ucfirst(explode(".",$agent_login)[0])." ".ucfirst(explode(".",$agent_login)[1]);
    }

    public function getLastName($agent_login)
    {
        return ucfirst(explode(".",$agent_login)[1]);
    }

    public function getFirstName($agent_login)
    {
        return ucfirst(explode(".",$agent_login)[0]);
    }

    public function sendMail($webhook)
    {
        $message = new \Swift_Message("New key in webhook");
        $message
            ->setFrom("piotr.mucha@dreamcommerce.com")
            ->setTo("piotr.mucha@dreamcommerce.com")
            ->setBody(
                $this->templating->render("@Call/unknow.field.mail.twig.html.html.twig",
                    ["data" => $webhook])
            ,'text/html')
        ;

        $result = $this->mailer->send($message);

        return $result;
    }
}