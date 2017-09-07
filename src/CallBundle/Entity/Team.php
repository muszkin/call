<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 14:27
 */

namespace CallBundle\Entity;

/**
 * Class Team
 * @package CallBundle\Entity
 */
class Team
{
    private $id;

    private $team;

    private $agents;

    private $queues;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->agents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set team
     *
     * @param string $team
     *
     * @return Team
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return string
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
     * @return Team
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

    /**
     * Add queue
     *
     * @param \CallBundle\Entity\Queue $queue
     *
     * @return Team
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
