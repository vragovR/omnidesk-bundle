<?php
namespace OmnideskBundle\Request\Group;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class AddGroupRequest
 * @package OmnideskBundle\Request\Group
 */
class AddGroupRequest implements RequestInterface
{
    /**
     * @var string
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
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
