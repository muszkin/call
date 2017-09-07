<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 12:32
 */

namespace CallBundle\Entity;

/**
 * Class Action
 * @package CallBundle\Entity
 */
class Action
{
    private $id;

    private $action;

    private $calls;

    public function __construct()
    {
        $this->calls = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set action
     *
     * @param string $action
     *
     * @return Action
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Add call
     *
     * @param \CallBundle\Entity\Call $call
     *
     * @return Action
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
}
