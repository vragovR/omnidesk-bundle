<?php
namespace OmnideskBundle\DataTransformer\Request\Group;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Group\EditGroupRequest;

/**
 * Class EditCasesRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class EditGroupRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param EditGroupRequest $value
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
     * @return EditGroupRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
