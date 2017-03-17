<?php
namespace OmnideskBundle\DataTransformer\Request;

use OmnideskBundle\Request\Message\GetMessagesRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class GetMessageRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class GetMessagesRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param GetMessagesRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'case_id' => $value->getCaseId(),
            'page' => $value->getPage(),
            'limit' => $value->getLimit(),
            'order' => $value->getOrder(),
        ];
    }

    /**
     * @param array $value
     * @return GetMessagesRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
