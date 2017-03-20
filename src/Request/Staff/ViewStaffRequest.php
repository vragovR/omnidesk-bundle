<?php
namespace OmnideskBundle\Request\Staff;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class ViewStaffRequest
 * @package OmnideskBundle\Request\Staff
 */
class ViewStaffRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $staffId;

    /**
     * @return int
     */
    public function getStaffId()
    {
        return $this->staffId;
    }

    /**
     * @param int $staffId
     */
    public function setStaffId($staffId)
    {
        $this->staffId = $staffId;
    }
}
