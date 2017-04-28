<?php
namespace OmnideskBundle\Response\Staff;

use Doctrine\Common\Collections\ArrayCollection;
use OmnideskBundle\Model\Staff;

/**
 * Class ListStaffResponse
 * @package OmnideskBundle\Response\Staff
 */
class ListStaffResponse
{
    /**
     * @var Staff[]|ArrayCollection
     */
    private $staffs;

    /**
     * @var int
     */
    private $totalCount;

    /**
     * ListStaffResponse constructor.
     */
    public function __construct()
    {
        $this->staffs = new ArrayCollection();
    }

    /**
     * @return Staff[]|ArrayCollection
     */
    public function getStaffs()
    {
        return $this->staffs;
    }

    /**
     * @param Staff $staff
     */
    public function addStaff(Staff $staff)
    {
        $this->staffs->add($staff);
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
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }
}
