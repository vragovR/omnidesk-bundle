<?php
namespace OmnideskBundle\DataTransformer\Request\User;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\User\EditUserRequest;

/**
 * Class EditUserRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class EditUserRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param EditUserRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'user_email' => $value->getEmail(),
            'user_full_name' => $value->getFullName(),
            'company_name' => $value->getCompanyName(),
            'company_position' => $value->getCompanyPosition(),
            'user_note' => $value->getNote(),
            'language_id' => $value->getLanguageId(),
            'custom_fields' => $value->getCustomFields(),
        ];
    }

    /**
     * @param array $value
     * @return EditUserRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
