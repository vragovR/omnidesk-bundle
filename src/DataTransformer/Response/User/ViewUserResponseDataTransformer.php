<?php
namespace OmnideskBundle\DataTransformer\Response\User;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\UserDataTransformer;
use OmnideskBundle\Response\User\UserResponse;

/**
 * Class ViewUserResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ViewUserResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var UserDataTransformer
     */
    protected $userDataTransformer;

    /**
     * UserDataTransformer constructor.
     * @param UserDataTransformer $userDataTransformer
     */
    public function __construct(UserDataTransformer $userDataTransformer)
    {
        $this->userDataTransformer = $userDataTransformer;
    }

    /**
     * @param array $value
     * @return UserResponse
     */
    public function transform($value)
    {
        $response = new UserResponse();

        $user = $this->userDataTransformer->transform($value['user']);

        $response->setUser($user);

        return $response;
    }

    /**
     * @param UserResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
