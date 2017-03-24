<?php
namespace OmnideskBundle\DataTransformer\Request\Message;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Message\AddMessageRequest;

/**
 * Class AddMessagesRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class AddMessageRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param AddMessageRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'case_id' => $value->getCaseId(),
            'content' => $value->getContent(),
            'content_html' => $value->getContentHtml(),
            'staff_id' => $value->getStaffId(),
            'user_id' => $value->getUserId(),
        ];
    }

    /**
     * @param array $value
     * @return AddMessageRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
