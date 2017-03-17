<?php
namespace OmnideskBundle\Request\Cases;

/**
 * Class GetCasesRequest
 * @package OmnideskBundle\Request\Cases
 */
class ViewCasesRequest
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
