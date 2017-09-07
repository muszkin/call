<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 15:38
 */

namespace CallBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebHookController extends Controller
{

    public function readWebHookAction(Request $request)
    {
        $webhookData = $request->request->all();

        $parser = $this->get('call.parse.webhook.service');

        $parser->parseWebHook($webhookData);

        return new JsonResponse(["success" => 1]);
    }
}