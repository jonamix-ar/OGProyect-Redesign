<?php

namespace App\Core\Entity;

use App\Core\Entity;

class MessagesEntity extends Entity
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    /**
     * Get the message id
     *
     * @return string
     */
    public function getMessageId()
    {
        return $this->data['message_id'];
    }

    /**
     * Get the message sender
     *
     * @return string
     */
    public function getMessageSender()
    {
        return $this->data['message_sender'];
    }

    /**
     * Get the message receiver
     *
     * @return string
     */
    public function getMessageReceiver()
    {
        return $this->data['message_receiver'];
    }

    /**
     * Get the message time
     *
     * @return string
     */
    public function getMessageTime()
    {
        return $this->data['message_time'];
    }

    /**
     * Get the message type
     *
     * @return string
     */
    public function getMessageType()
    {
        return $this->data['message_type'];
    }

    /**
     * Get the message from
     *
     * @return string
     */
    public function getMessageFrom()
    {
        return $this->data['message_from'];
    }

    /**
     * Get the message subject
     *
     * @return string
     */
    public function getMessageSubject()
    {
        return $this->data['message_subject'];
    }

    /**
     * Get the message text
     *
     * @return string
     */
    public function getMessageText()
    {
        return $this->data['message_text'];
    }

    /**
     * Get the message read
     *
     * @return string
     */
    public function getMessageRead()
    {
        return $this->data['message_read'];
    }
}
