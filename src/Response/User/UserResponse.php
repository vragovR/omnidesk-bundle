<?php
namespace OmnideskBundle\Response\User;

use OmnideskBundle\Entity\User;

/**
 * Class UserResponse
 * @package OmnideskBundle\Response\User
 */
class UserResponse
{
    /**
     * @var string
     */
    const ERROR_EMAIL_ALREADY_EXIST = 'email_already_exist';

    /**
     * @var string
     */
    const ERROR_PHONE_ALREADY_EXIST = 'phone_already_exist';

    /**
     * @var string
     */
    const ERROR_WRONG_EMAIL = 'wrong_email';

    /**
     * @var User
     */
    private $user;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}
