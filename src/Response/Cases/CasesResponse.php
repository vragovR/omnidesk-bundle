<?php
namespace OmnideskBundle\Response\Cases;

use OmnideskBundle\Model\Cases;

/**
 * Class CasesResponse
 * @package OmnideskBundle\Response\Cases
 */
class CasesResponse
{
    /**
     * @var string
     */
    const ERROR_INCORRECT_USER_EMAIL = 'incorrect_user_email';

    /**
     * @var string
     */
    const ERROR_STAFF_HAS_NOT_ACCESS = 'staff_has_not_access';

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
