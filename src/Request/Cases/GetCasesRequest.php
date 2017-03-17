<?php
namespace OmnideskBundle\Request\Cases;

/**
 * Class GetCasesRequest
 * @package OmnideskBundle\Request\Cases
 */
class GetCasesRequest
{
    /**
     * @var string
     */
    const SORT_UPDATED_AT_DESC = 'updated_at_desc';

    /**
     * @var string
     */
    const SORT_UPDATED_AT_ASC = 'updated_at_asc';

    /**
     * @var string
     */
    const SORT_CREATED_AT_DESC = 'created_at_desc';

    /**
     * @var string
     */
    const SORT_CREATED_AT_ASC = 'created_at_asc';

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $userEmail;

    /**
     * @var string
     */
    private $userPhone;

    /**
     * @var string
     */
    private $subject;

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
    private $channel;

    /**
     * @var string
     */
    private $priority;

    /**
     * @var string
     */
    private $status;

    /**
     * @var array
     */
    private $customFields;

    /**
     * @var array
     */
    private $labels;

    /**
     * @var string
     */
    private $sort;

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

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
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     * @return $this
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserPhone()
    {
        return $this->userPhone;
    }

    /**
     * @param string $userPhone
     * @return $this
     */
    public function setUserPhone($userPhone)
    {
        $this->userPhone = $userPhone;

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
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     * @return $this
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

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

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     * @return $this
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }
}
