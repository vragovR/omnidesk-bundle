<?php
namespace OmnideskBundle\Request\Cases;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class GetCasesRequest
 * @package OmnideskBundle\Request\Cases
 */
class ViewCasesRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $caseId;

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
}
