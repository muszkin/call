<?php
/**
 * Created by PhpStorm.
 * User: muszk
 * Date: 09.06.2017
 * Time: 12:32
 */

namespace CallBundle\Entity;

/**
 * Class Call
 * @package CallBundle\Entity
 */
class Call
{
    private $call_id;

    private $action;

    private $conversation_id;

    private $agent;

    private $date;

    private $chat_queue_id;

    private $client_name;

    private $client_email;

    private $connection_id;

    private $queue;

    private $source_number;

    private $destination_number;

    private $duration;

    private $billsec;

    private $filename;

    private $source_name;

    private $id;

    private $name;

    private $record_id;

    private $phone_number;

    private $system_status;

    private $status_id;

    private $pause_id;

    private $previous_pause_id;

    private $customer_id;

    private $unknow_field;

    /**
     * Get callId
     *
     * @return integer
     */
    public function getCallId()
    {
        return $this->call_id;
    }

    /**
     * Set conversationId
     *
     * @param string $conversationId
     *
     * @return Call
     */
    public function setConversationId($conversationId)
    {
        $this->conversation_id = $conversationId;

        return $this;
    }

    /**
     * Get conversationId
     *
     * @return string
     */
    public function getConversationId()
    {
        return $this->conversation_id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Call
     */
    public function setDate($date)
    {
        if ($date instanceof \DateTime) {
            $this->date = $date;
        }else{
            $this->date = new \DateTime($date);
        }

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set chatQueueId
     *
     * @param integer $chatQueueId
     *
     * @return Call
     */
    public function setChatQueueId($chatQueueId)
    {
        $this->chat_queue_id = $chatQueueId;

        return $this;
    }

    /**
     * Get chatQueueId
     *
     * @return integer
     */
    public function getChatQueueId()
    {
        return $this->chat_queue_id;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     *
     * @return Call
     */
    public function setClientName($clientName)
    {
        $this->client_name = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Set clientEmail
     *
     * @param string $clientEmail
     *
     * @return Call
     */
    public function setClientEmail($clientEmail)
    {
        $this->client_email = $clientEmail;

        return $this;
    }

    /**
     * Get clientEmail
     *
     * @return string
     */
    public function getClientEmail()
    {
        return $this->client_email;
    }

    /**
     * Set connectionId
     *
     * @param string $connectionId
     *
     * @return Call
     */
    public function setConnectionId($connectionId)
    {
        $this->connection_id = $connectionId;

        return $this;
    }

    /**
     * Get connectionId
     *
     * @return string
     */
    public function getConnectionId()
    {
        return $this->connection_id;
    }

    /**
     * Set sourceNumber
     *
     * @param string $sourceNumber
     *
     * @return Call
     */
    public function setSourceNumber($sourceNumber)
    {
        $this->source_number = $sourceNumber;

        return $this;
    }

    /**
     * Get sourceNumber
     *
     * @return string
     */
    public function getSourceNumber()
    {
        return $this->source_number;
    }

    /**
     * Set destinationNumber
     *
     * @param string $destinationNumber
     *
     * @return Call
     */
    public function setDestinationNumber($destinationNumber)
    {
        $this->destination_number = $destinationNumber;

        return $this;
    }

    /**
     * Get destinationNumber
     *
     * @return string
     */
    public function getDestinationNumber()
    {
        return $this->destination_number;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Call
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set billsec
     *
     * @param integer $billsec
     *
     * @return Call
     */
    public function setBillsec($billsec)
    {
        $this->billsec = $billsec;

        return $this;
    }

    /**
     * Get billsec
     *
     * @return integer
     */
    public function getBillsec()
    {
        return $this->billsec;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Call
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set sourceName
     *
     * @param string $sourceName
     *
     * @return Call
     */
    public function setSourceName($sourceName)
    {
        $this->source_name = $sourceName;

        return $this;
    }

    /**
     * Get sourceName
     *
     * @return string
     */
    public function getSourceName()
    {
        return $this->source_name;
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Call
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Call
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set recordId
     *
     * @param integer $recordId
     *
     * @return Call
     */
    public function setRecordId($recordId)
    {
        $this->record_id = $recordId;

        return $this;
    }

    /**
     * Get recordId
     *
     * @return integer
     */
    public function getRecordId()
    {
        return $this->record_id;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Call
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set systemStatus
     *
     * @param string $systemStatus
     *
     * @return Call
     */
    public function setSystemStatus($systemStatus)
    {
        $this->system_status = $systemStatus;

        return $this;
    }

    /**
     * Get systemStatus
     *
     * @return string
     */
    public function getSystemStatus()
    {
        return $this->system_status;
    }

    /**
     * Set statusId
     *
     * @param integer $statusId
     *
     * @return Call
     */
    public function setStatusId($statusId)
    {
        $this->status_id = $statusId;

        return $this;
    }

    /**
     * Get statusId
     *
     * @return integer
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * Set pauseId
     *
     * @param integer $pauseId
     *
     * @return Call
     */
    public function setPauseId($pauseId)
    {
        $this->pause_id = $pauseId;

        return $this;
    }

    /**
     * Get pauseId
     *
     * @return integer
     */
    public function getPauseId()
    {
        return $this->pause_id;
    }

    /**
     * Set previousPauseId
     *
     * @param integer $previousPauseId
     *
     * @return Call
     */
    public function setPreviousPauseId($previousPauseId)
    {
        $this->previous_pause_id = $previousPauseId;

        return $this;
    }

    /**
     * Get previousPauseId
     *
     * @return integer
     */
    public function getPreviousPauseId()
    {
        return $this->previous_pause_id;
    }

    /**
     * Set action
     *
     * @param \CallBundle\Entity\Action $action
     *
     * @return Call
     */
    public function setAction(\CallBundle\Entity\Action $action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return \CallBundle\Entity\Action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set agent
     *
     * @param \CallBundle\Entity\Agent $agent
     *
     * @return Call
     */
    public function setAgent(\CallBundle\Entity\Agent $agent = null)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return \CallBundle\Entity\Agent
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set queue
     *
     * @param \CallBundle\Entity\Queue $queue
     *
     * @return Call
     */
    public function setQueue(\CallBundle\Entity\Queue $queue = null)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \CallBundle\Entity\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @return mixed
     */
    public function getUnknowField()
    {
        return $this->unknow_field;
    }

    /**
     * @param mixed $unknow_field
     */
    public function setUnknowField($unknow_field)
    {
        $this->unknow_field = $unknow_field;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }
}
