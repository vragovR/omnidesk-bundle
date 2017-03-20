<?php
namespace OmnideskBundle\DataTransformer\Request\User;

use OmnideskBundle\Request\User\ViewUserRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ViewUserRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class ViewUserRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ViewUserRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'user_id' => $value->getUserId(),
        ];
    }

    /**
     * @param array $value
     * @return ViewUserRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
