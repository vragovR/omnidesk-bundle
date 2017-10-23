<?php

namespace OmnideskBundle\DataTransformer\Model;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Model\Group;

/**
 * Class GroupDataTransformer
 * @package OmnideskBundle\DataTransformer\Model
 */
class GroupDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Group
     */
    public function transform($value)
    {
        $model = new Group();
        $model
            ->setId($value['group_id'])
            ->setTitle($value['group_title'])
            ->setFromName($value['group_from_name'])
            ->setSignature($value['group_signature'])
            ->setActive($value['active'])
            ->setCreatedAt(new \DateTime($value['created_at']))
            ->setUpdatedAt(new \DateTime($value['updated_at']));

        return $model;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
