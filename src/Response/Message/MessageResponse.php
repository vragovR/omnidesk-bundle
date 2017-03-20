<?php
namespace OmnideskBundle\Response\Message;

use OmnideskBundle\Entity\Message;

/**
 * Class MessageResponse
 * @package OmnideskBundle\Response\Message
 */
class MessageResponse
{
    /**
     * @var Message
     */
    private $message;

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;
    }
}
