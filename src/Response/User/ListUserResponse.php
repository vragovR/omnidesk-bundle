<?php
namespace OmnideskBundle\Response\User;

use Doctrine\Common\Collections\ArrayCollection;
use OmnideskBundle\Entity\User;

/**
 * Class ListUserResponse
 * @package OmnideskBundle\Response\User
 */
class ListUserResponse
{
    /**
     * @var User[]|ArrayCollection
     */
    private $users;

    /**
     * @var int
     */
    private $totalCount;

    /**
     * ListUserResponse constructor.
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @return User[]|ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->users->add($user);
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
