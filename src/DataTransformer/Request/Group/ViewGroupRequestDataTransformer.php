<?php
namespace OmnideskBundle\DataTransformer\Request\Group;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Group\ViewGroupRequest;

/**
 * Class ViewGroupRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request\Group
 */
class ViewGroupRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ViewGroupRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'group_id' => $value->getGroupId(),
        ];
    }

    /**
     * @param array $value
     * @return ViewGroupRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
