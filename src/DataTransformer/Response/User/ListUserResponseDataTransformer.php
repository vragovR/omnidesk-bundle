<?php
namespace OmnideskBundle\DataTransformer\Response\User;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\UserDataTransformer;
use OmnideskBundle\Response\User\ListUserResponse;

/**
 * Class ListUserResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ListUserResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var UserDataTransformer
     */
    protected $userDataTransformer;

    /**
     * GetCasesResponseDataTransformer constructor.
     * @param UserDataTransformer $userDataTransformer
     */
    public function __construct(UserDataTransformer $userDataTransformer)
    {
        $this->userDataTransformer = $userDataTransformer;
    }

    /**
     * @param array $value
     * @return ListUserResponse
     */
    public function transform($value)
    {
        $response = new ListUserResponse();

        foreach ($value as $item) {
            if (isset($item['user'])) {
                $response->addUser($this->userDataTransformer->transform($item['user']));
            }
        }

        $response->setTotalCount(isset($value['total_count']) ? $value['total_count'] : 0);

        return $response;
    }

    /**
     * @param ListUserResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
