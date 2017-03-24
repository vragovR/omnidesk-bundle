<?php
namespace OmnideskBundle\DataTransformer\Request\User;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\User\ListUserRequest;

/**
 * Class ListUserRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class ListUserRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ListUserRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'page' => $value->getPage(),
            'limit' => $value->getLimit(),
            'user_phone' => $value->getPhone(),
            'user_email' => $value->getEmail(),
            'language_id' => $value->getLanguageId(),
            'custom_fields' => $value->getCustomFields(),
            'amount_of_cases' => $value->isAmountOfCases(),
        ];
    }

    /**
     * @param array $value
     * @return ListUserRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
