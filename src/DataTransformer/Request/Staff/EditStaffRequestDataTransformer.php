<?php
namespace OmnideskBundle\DataTransformer\Request\Staff;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Staff\EditStaffRequest;

/**
 * Class EditStaffRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class EditStaffRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param EditStaffRequest $value
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
     * @return EditStaffRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
