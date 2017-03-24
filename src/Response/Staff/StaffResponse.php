<?php
namespace OmnideskBundle\Response\Staff;

use OmnideskBundle\Entity\Staff;

/**
 * Class StaffResponse
 * @package OmnideskBundle\Response\Staff
 */
class StaffResponse
{
    /**
     * @var Staff
     */
    private $staff;

    /**
     * @return Staff
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param Staff $staff
     */
    public function setStaff(Staff $staff)
    {
        $this->staff = $staff;
    }
}