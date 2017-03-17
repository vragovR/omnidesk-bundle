<?php
namespace OmnideskBundle\Response\Message;

use Doctrine\Common\Collections\ArrayCollection;
use OmnideskBundle\Entity\Message;

/**
 * Class GetMessageResponse
 * @package OmnideskBundle\Response\Message
 */
class GetMessagesResponse
{
    /**
     * @var Message[]|ArrayCollection
     */
    private $messages;

    /**
     * @var int
     */
    private $totalCount;

    /**
     * GetCasesResponse constructor.
     */
    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    /**
     * @return Message[]|ArrayCollection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param Message $message
     */
    public function addMessage(Message $message)
    {
        $this->messages->add($message);
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }
}
