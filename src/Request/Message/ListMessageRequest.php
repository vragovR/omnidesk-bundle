<?php
namespace OmnideskBundle\Request\Message;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class ListMessageRequest
 * @package OmnideskBundle\Request\Message
 */
class ListMessageRequest implements RequestInterface
{
    /**
     * @var string
     */
    const ORDER_ASC = 'asc';

    /**
     * @var string
     */
    const ORDER_DESC = 'desc';

    /**
     * @var int
     */
    private $caseId;

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var string
     */
    private $order;

    /**
     * @return int
     */
    public function getCaseId()
    {
        return $this->caseId;
    }

    /**
     * @param int $caseId
     */
    public function setCaseId($caseId)
    {
        $this->caseId = $caseId;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
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
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}
