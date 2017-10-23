<?php
namespace OmnideskBundle\Response\Group;

use OmnideskBundle\Model\Group;

/**
 * Class GroupResponse
 * @package OmnideskBundle\Response\Group
 */
class GroupResponse
{
    /**
     * @var Group
     */
    private $group;

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
    }
}
