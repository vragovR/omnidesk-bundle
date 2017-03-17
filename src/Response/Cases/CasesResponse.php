<?php
namespace OmnideskBundle\Response\Cases;

use OmnideskBundle\Entity\Cases;

/**
 * Class CasesResponse
 * @package OmnideskBundle\Response\Cases
 */
class CasesResponse
{
    /**
     * @var Cases
     */
    private $cases;

    /**
     * @return Cases
     */
    public function getCases()
    {
        return $this->cases;
    }

    /**
     * @param Cases $cases
     */
    public function setCases(Cases $cases)
    {
        $this->cases = $cases;
    }
}
