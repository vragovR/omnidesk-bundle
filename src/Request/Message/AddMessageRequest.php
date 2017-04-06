<?php
namespace OmnideskBundle\Request\Message;

use Doctrine\Common\Collections\ArrayCollection;
use OmnideskBundle\Request\RequestInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class AddMessageRequest
 * @package OmnideskBundle\Request\Message
 */
class AddMessageRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $caseId;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $contentHtml;

    /**
     * @var int
     */
    private $staffId;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var ArrayCollection|File[]
     */
    private $attachments;

    /**
     * AddMessageRequest constructor.
     */
    public function __construct()
    {
        $this->attachments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getCaseId()
    {
        return $this->caseId;
    }

    /**
     * @param int $caseId
     * @return $this
     */
    public function setCaseId($caseId)
    {
        $this->caseId = $caseId;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentHtml()
    {
        return $this->contentHtml;
    }

    /**
     * @param string $contentHtml
     * @return $this
     */
    public function setContentHtml($contentHtml)
    {
        $this->contentHtml = $contentHtml;

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
     * @return ArrayCollection|File[]
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param File $attachment
     */
    public function addAttachment(File $attachment)
    {
        $this->attachments->add($attachment);
    }
}
