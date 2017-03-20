<?php
namespace OmnideskBundle\DataTransformer\Request\User;

use OmnideskBundle\Request\User\AddUserRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class AddUserRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class AddUserRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param AddUserRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'user_email' => $value->getEmail(),
            'user_phone' => $value->getPhone(),
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
     * @return AddUserRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
