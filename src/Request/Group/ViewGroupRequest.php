<?php
namespace OmnideskBundle\Request\Group;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class ViewGroupRequest
 * @package OmnideskBundle\Request\Group
 */
class ViewGroupRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $groupId;

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId)
    {
        $this->groupId = $groupId;
    }
}
