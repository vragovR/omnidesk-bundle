<?php
namespace OmnideskBundle\Request\Staff;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class EditStaffRequest
 * @package OmnideskBundle\Request\Staff
 */
class EditStaffRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $staffId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $signature;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}
