<?php
namespace OmnideskBundle\Response\Message;

use OmnideskBundle\Model\Message;

/**
 * Class MessageResponse
 * @package OmnideskBundle\Response\Message
 */
class MessageResponse
{
    /**
     * @var string
     */
    const ERROR_STAFF_NOT_ACTIVE = 'staff_not_active';

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
