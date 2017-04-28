<?php
namespace OmnideskBundle\DataTransformer\Model;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Model\Message;

/**
 * Class MessageDataTransformer
 * @package OmnideskBundle\DataTransformer\Model
 */
class MessageDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Message
     */
    public function transform($value)
    {
        $model = new Message();
        $model
            ->setId($value['message_id'])
            ->setUserId($value['user_id'])
            ->setStaffId($value['staff_id'])
            ->setContent($value['content'])
            ->setContentHtml($value['content_html'])
            ->setAttachments($value['attachments'])
            ->setNote($value['note'])
            ->setCreatedAt(new \DateTime($value['created_at']));

        return $model;
    }

    /**
     * @param Message $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
