<?php
namespace OmnideskBundle\Request\Staff;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class ListStaffRequest
 * @package OmnideskBundle\Request\Staff
 */
class ListStaffRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $limit;

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     *
     * @return ListStaffRequest
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return ListStaffRequest
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }
}
