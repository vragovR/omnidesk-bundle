<?php
namespace OmnideskBundle\Response\Cases;

use Doctrine\Common\Collections\ArrayCollection;
use OmnideskBundle\Model\Cases;

/**
 * Class GetCasesResponse
 * @package OmnideskBundle\Response\Cases
 */
class GetCasesResponse
{
    /**
     * @var Cases[]|ArrayCollection
     */
    private $cases;

    /**
     * @var int
     */
    private $totalCount;

    /**
     * GetCasesResponse constructor.
     */
    public function __construct()
    {
        $this->cases = new ArrayCollection();
    }

    /**
     * @return Cases[]|ArrayCollection
     */
    public function getCases()
    {
        return $this->cases;
    }

    /**
     * @param Cases $cases
     * @return $this
     */
    public function addCases(Cases $cases)
    {
        $this->cases->add($cases);

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
