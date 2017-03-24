<?php
namespace OmnideskBundle\DataTransformer\Request\Staff;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Staff\ListStaffRequest;

/**
 * Class ListStaffRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class ListStaffRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ListStaffRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'page' => $value->getPage(),
            'limit' => $value->getLimit(),
        ];
    }

    /**
     * @param array $value
     * @return ListStaffRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
