<?php
namespace OmnideskBundle\Response\Cases;

use OmnideskBundle\Entity\Cases;

/**
 * Class GetCasesResponse
 * @package OmnideskBundle\Response\Cases
 */
class CreateCasesResponse
{
    /**
     * @var Cases
     */
    private $case;

    /**
     * @return Cases
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * @param Cases $case
     */
    public function setCase(Cases $case)
    {
        $this->case = $case;
    }
}
