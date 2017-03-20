<?php
namespace OmnideskBundle\DataTransformer\Request\Staff;

use OmnideskBundle\Request\Staff\ViewStaffRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ViewStaffRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class ViewStaffRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ViewStaffRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'staff_id' => $value->getStaffId(),
        ];
    }

    /**
     * @param array $value
     * @return ViewStaffRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
