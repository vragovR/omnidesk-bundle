<?php
namespace OmnideskBundle\DataTransformer\Entity;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Entity\User;

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
        $entity = new User();
        $entity
            ->setId($value['user_id'])
            ->setType($value['type'])
            ->setEmail(isset($value['email']) ? $value['email'] : null)
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
            ->setPassword(isset($value['password']) ? $value['password'] : null)
            ->setCustomFields(isset($value['custom_fields']) ? $value['custom_fields'] : []);

        return $entity;
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
