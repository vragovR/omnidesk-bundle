<?php
namespace OmnideskBundle\Request\Group;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class EditGroupRequest
 * @package OmnideskBundle\Request\Group
 */
class EditGroupRequest implements RequestInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $fromName;

    /**
     * @var string|null
     */
    private $signature;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle(string $title = null)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param null|string $fromName
     */
    public function setFromName(string $fromName = null)
    {
        $this->fromName = $fromName;
    }

    /**
     * @return null|string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param null|string $signature
     */
    public function setSignature(string $signature = null)
    {
        $this->signature = $signature;
    }
}
