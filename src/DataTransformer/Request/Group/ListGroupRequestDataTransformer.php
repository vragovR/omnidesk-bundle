<?php
namespace OmnideskBundle\DataTransformer\Request\Group;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Group\ListGroupRequest;

/**
 * Class ListGroupRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request\Group
 */
class ListGroupRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ListGroupRequest $value
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
     * @return ListGroupRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
