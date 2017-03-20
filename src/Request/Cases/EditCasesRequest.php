<?php
namespace OmnideskBundle\Request\Cases;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class EditCasesRequest
 * @package OmnideskBundle\Request\Cases
 */
class EditCasesRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $caseId;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var int
     */
    private $groupId;

    /**
     * @var int
     */
    private $staffId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $priority;

    /**
     * @var int
     */
    private $languageId;

    /**
     * @var array
     */
    private $customFields;

    /**
     * @var array
     */
    private $addLabels;

    /**
     * @var array
     */
    private $deleteLabels;

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
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * @param array $customFields
     * @return $this
     */
    public function setCustomFields($customFields)
    {
        $this->customFields = $customFields;

        return $this;
    }

    /**
     * @return array
     */
    public function getAddLabels()
    {
        return $this->addLabels;
    }

    /**
     * @param array $addLabels
     * @return $this
     */
    public function setAddLabels($addLabels)
    {
        $this->addLabels = $addLabels;

        return $this;
    }

    /**
     * @return array
     */
    public function getDeleteLabels()
    {
        return $this->deleteLabels;
    }

    /**
     * @param array $deleteLabels
     * @return $this
     */
    public function setDeleteLabels($deleteLabels)
    {
        $this->deleteLabels = $deleteLabels;

        return $this;
    }
}
