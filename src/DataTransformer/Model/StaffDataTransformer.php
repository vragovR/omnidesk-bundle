<?php
namespace OmnideskBundle\DataTransformer\Model;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Model\Staff;

/**
 * Class StaffDataTransformer
 * @package OmnideskBundle\DataTransformer\Model
 */
class StaffDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Staff
     */
    public function transform($value)
    {
        $model = new Staff();
        $model
            ->setId($value['staff_id'])
            ->setEmail($value['staff_email'])
            ->setFullName($value['staff_full_name'])
            ->setSignature($value['staff_signature'])
            ->setThumbnail($value['thumbnail'])
            ->setActive($value['active'])
            ->setCreatedAt(new \DateTime($value['created_at']))
            ->setUpdatedAt(new \DateTime($value['updated_at']));

        return $model;
    }

    /**
     * @param array $value
     * @return Staff
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
