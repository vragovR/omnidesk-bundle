<?php
namespace OmnideskBundle\DataTransformer\Entity;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Entity\Message;

/**
 * Class MessageDataTransformer
 * @package OmnideskBundle\DataTransformer\Entity
 */
class MessageDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Message
     */
    public function transform($value)
    {
        $entity = new Message();
        $entity
            ->setId($value['message_id'])
            ->setUserId($value['user_id'])
            ->setStaffId($value['staff_id'])
            ->setContent($value['content'])
            ->setContentHtml($value['content_html'])
            ->setAttachments($value['attachments'])
            ->setNote($value['note'])
            ->setCreatedAt(new \DateTime($value['created_at']));

        return $entity;
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
