<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 12:32
 */

namespace CallBundle\Entity;

/**
 * Class Queue
 * @package CallBundle\Entity
 */
class Queue
{
    private $id;

    private $queue;

    private $team;

    private $agents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->agents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set queue
     *
     * @param string $queue
     *
     * @return Queue
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return string
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Set team
     *
     * @param \CallBundle\Entity\Team $team
     *
     * @return Queue
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
     * Add agent
     *
     * @param \CallBundle\Entity\Agent $agent
     *
     * @return Queue
     */
    public function addAgent(\CallBundle\Entity\Agent $agent)
    {
        $this->agents[] = $agent;

        return $this;
    }

    /**
     * Remove agent
     *
     * @param \CallBundle\Entity\Agent $agent
     */
    public function removeAgent(\CallBundle\Entity\Agent $agent)
    {
        $this->agents->removeElement($agent);
    }

    /**
     * Get agents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgents()
    {
        return $this->agents;
    }
}
