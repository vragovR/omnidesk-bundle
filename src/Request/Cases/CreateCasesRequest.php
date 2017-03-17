<?php
namespace OmnideskBundle\Request\Cases;

/**
 * Class CreateCasesRequest
 * @package OmnideskBundle\Request\Cases
 */
class CreateCasesRequest
{
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
    private $userFullName;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $contentHtml;

    /**
     * @var integer
     */
    private $groupId;

    /**
     * @var integer
     */
    private $languageId;

    /**
     * @var array
     */
    private $customFields;

    /**
     * @var array
     */
    private $labels;

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
    public function getUserFullName()
    {
        return $this->userFullName;
    }

    /**
     * @param string $userFullName
     * @return $this
     */
    public function setUserFullName($userFullName)
    {
        $this->userFullName = $userFullName;

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
