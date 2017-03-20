<?php
namespace OmnideskBundle\DataTransformer\Request\Message;

use OmnideskBundle\Request\Message\ListMessageRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ListMessagesRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class ListMessageRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ListMessageRequest $value
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
     * @return ListMessageRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
