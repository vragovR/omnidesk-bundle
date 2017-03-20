<?php
namespace OmnideskBundle\DataTransformer\Request\Staff;

use OmnideskBundle\Request\Staff\AddStaffRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class AddStaffRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class AddStaffRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param AddStaffRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'staff_email' => $value->getEmail(),
            'staff_full_name' => $value->getFullName(),
            'staff_signature' => $value->getSignature(),
        ];
    }

    /**
     * @param array $value
     * @return AddStaffRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
