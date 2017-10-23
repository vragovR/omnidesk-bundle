<?php
namespace OmnideskBundle\Response\Group;

use Doctrine\Common\Collections\ArrayCollection;
use OmnideskBundle\Model\Group;

/**
 * Class GetGroupResponse
 * @package OmnideskBundle\Response\Group
 */
class GetGroupResponse
{
    /**
     * @var Group[]|ArrayCollection
     */
    private $group;

    /**
     * @var int
     */
    private $totalCount;

    /**
     * GetGroupResponse constructor.
     */
    public function __construct()
    {
        $this->group = new ArrayCollection();
    }

    /**
     * @return Group[]|ArrayCollection
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     * @return $this
     */
    public function addGroup(Group $group)
    {
        $this->group->add($group);

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;

        return $this;
    }
}
