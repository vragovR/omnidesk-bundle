<?php
namespace OmnideskBundle\Response\Language;

use Doctrine\Common\Collections\ArrayCollection;
use OmnideskBundle\Entity\Language;

/**
 * Class GetLanguageResponse
 * @package OmnideskBundle\Response\Cases
 */
class GetLanguageResponse
{
    /**
     * @var Language[]|ArrayCollection
     */
    private $languages;

    /**
     * @var int
     */
    private $totalCount;

    /**
     * GetCasesResponse constructor.
     */
    public function __construct()
    {
        $this->languages = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|Language[]
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param Language $language
     */
    public function addLanguage(Language $language)
    {
        $this->languages->add($language);
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
