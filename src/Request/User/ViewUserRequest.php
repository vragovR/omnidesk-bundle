<?php
namespace OmnideskBundle\Request\User;

use OmnideskBundle\Request\RequestInterface;

/**
 * Class ViewUserRequest
 * @package OmnideskBundle\Request\User
 */
class ViewUserRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
