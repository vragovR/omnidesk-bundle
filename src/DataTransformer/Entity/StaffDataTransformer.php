<?php
namespace OmnideskBundle\DataTransformer\Entity;

use OmnideskBundle\Entity\Staff;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class StaffDataTransformer
 * @package OmnideskBundle\DataTransformer\Entity
 */
class StaffDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Staff
     */
    public function transform($value)
    {
        $entity = new Staff();
        $entity
            ->setId($value['staff_id'])
            ->setEmail($value['staff_email'])
            ->setFullName($value['staff_full_name'])
            ->setSignature($value['staff_signature'])
            ->setThumbnail($value['thumbnail'])
            ->setActive($value['active'])
            ->setCreatedAt(new \DateTime($value['created_at']))
            ->setUpdatedAt(new \DateTime($value['updated_at']));

        return $entity;
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
