<?php
namespace OmnideskBundle\DataTransformer\Request\Group;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Group\AddGroupRequest;

/**
 * Class AddGroupRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request\Group
 */
class AddGroupRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param AddGroupRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'group_title' => $value->getTitle(),
            'group_from_name' => $value->getFromName(),
            'group_signature' => $value->getSignature(),
        ];
    }

    /**
     * @param array $value
     * @return AddGroupRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
