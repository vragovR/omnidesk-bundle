<?php
namespace OmnideskBundle\Entity;

/**
 * Class Cases
 * @package OmnideskBundle\Entity
 */
class Cases
{
    /**
     * @var string
     */
    const CHANNEL_EMAIL = 'email';

    /**
     * @var string
     */
    const CHANNEL_CHAT = 'chat';

    /**
     * @var string
     */
    const CHANNEL_TWITTER = 'twitter';

    /**
     * @var string
     */
    const CHANNEL_FACEBOOK = 'facebook';

    /**
     * @var string
     */
    const CHANNEL_IDEA = 'idea';

    /**
     * @var string
     */
    const PRIORITY_LOW = 'low';

    /**
     * @var string
     */
    const PRIORITY_NORMAL = 'normal';

    /**
     * @var string
     */
    const PRIORITY_HIGH = 'high';

    /**
     * @var string
     */
    const PRIORITY_CRITICAL = 'critical';

    /**
     * @var string
     */
    const STATUS_OPEN = 'open';

    /**
     * @var string
     */
    const STATUS_WAITING = 'waiting';

    /**
     * @var string
     */
    const STATUS_CLOSED = 'closed';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $staffId;

    /**
     * @var int
     */
    private $groupId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $priority;

    /**
     * @var string
     */
    private $chanel;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @var bool
     */
    private $deleted;

    /**
     * @var bool
     */
    private $spam;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $closingSpeed;

    /**
     * @var int
     */
    private $languageId;

    /**
     * @var array
     */
    private $labels;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getStaffId()
    {
        return $this->staffId;
    }

    /**
     * @param int $staffId
     * @return $this
     */
    public function setStaffId($staffId)
    {
        $this->staffId = $staffId;

        return $this;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return string
     */
    public function getChanel()
    {
        return $this->chanel;
    }

    /**
     * @param string $chanel
     * @return $this
     */
    public function setChanel($chanel)
    {
        $this->chanel = $chanel;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     * @return $this
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return $this
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSpam()
    {
        return $this->spam;
    }

    /**
     * @param bool $spam
     * @return $this
     */
    public function setSpam($spam)
    {
        $this->spam = $spam;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getClosingSpeed()
    {
        return $this->closingSpeed;
    }

    /**
     * @param string $closingSpeed
     * @return $this
     */
    public function setClosingSpeed($closingSpeed)
    {
        $this->closingSpeed = $closingSpeed;

        return $this;
    }

    /**
     * @return int
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param int $languageId
     * @return $this
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return $this
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }
}
