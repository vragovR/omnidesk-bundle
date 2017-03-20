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
