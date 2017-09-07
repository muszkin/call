<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 12:32
 */

namespace CallBundle\Entity;

/**
 * Class Agent
 * @package CallBundle\Entity
 */
class Agent
{
    private $id;

    private $fullname;

    private $firstname;

    private $lastname;

    private $thulium_login;

    private $sip;

    private $team;

    private $calls;

    private $queues;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->calls = new \Doctrine\Common\Collections\ArrayCollection();
        $this->queues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Agent
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Agent
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Agent
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set thuliumLogin
     *
     * @param string $thuliumLogin
     *
     * @return Agent
     */
    public function setThuliumLogin($thuliumLogin)
    {
        $this->thulium_login = $thuliumLogin;

        return $this;
    }

    /**
     * Get thuliumLogin
     *
     * @return string
     */
    public function getThuliumLogin()
    {
        return $this->thulium_login;
    }

    /**
     * Set sip
     *
     * @param integer $sip
     *
     * @return Agent
     */
    public function setSip($sip)
    {
        $this->sip = $sip;

        return $this;
    }

    /**
     * Get sip
     *
     * @return integer
     */
    public function getSip()
    {
        return $this->sip;
    }

    /**
     * Set team
     *
     * @param \CallBundle\Entity\Team $team
     *
     * @return Agent
     */
    public function setTeam(\CallBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \CallBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Add call
     *
     * @param \CallBundle\Entity\Call $call
     *
     * @return Agent
     */
    public function addCall(\CallBundle\Entity\Call $call)
    {
        $this->calls[] = $call;

        return $this;
    }

    /**
     * Remove call
     *
     * @param \CallBundle\Entity\Call $call
     */
    public function removeCall(\CallBundle\Entity\Call $call)
    {
        $this->calls->removeElement($call);
    }

    /**
     * Get calls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalls()
    {
        return $this->calls;
    }

    /**
     * Add queue
     *
     * @param \CallBundle\Entity\Queue $queue
     *
     * @return Agent
     */
    public function addQueue(\CallBundle\Entity\Queue $queue)
    {
        $this->queues[] = $queue;

        return $this;
    }

    /**
     * Remove queue
     *
     * @param \CallBundle\Entity\Queue $queue
     */
    public function removeQueue(\CallBundle\Entity\Queue $queue)
    {
        $this->queues->removeElement($queue);
    }

    /**
     * Get queues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQueues()
    {
        return $this->queues;
    }
}
