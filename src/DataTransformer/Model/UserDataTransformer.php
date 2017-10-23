<?php
namespace OmnideskBundle\DataTransformer\Model;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Model\User;

/**
 * Class CasesDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class UserDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return User
     */
    public function transform($value)
    {
        $model = new User();
        $model
            ->setId($value['user_id'])
            ->setType($value['type'])
            ->setEmail($value['email'] ?? null)
            ->setLanguageId($value['language_id'])
            ->setFullName($value['user_full_name'])
            ->setCompanyName($value['company_name'])
            ->setCompanyPosition($value['company_position'])
            ->setThumbnail($value['thumbnail'])
            ->setConfirmed($value['confirmed'])
            ->setActive($value['active'])
            ->setDelete($value['deleted'])
            ->setCreatedAt(new \DateTime($value['created_at']))
            ->setUpdatedAt(new \DateTime($value['updated_at']))
            ->setPassword($value['password'] ?? null)
            ->setCustomFields($value['custom_fields'] ?? []);

        return $model;
    }

    /**
     * @param array $value
     * @return User
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
