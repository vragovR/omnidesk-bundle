<?php
namespace OmnideskBundle\DataTransformer\Response\Message;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Entity\MessageDataTransformer;
use OmnideskBundle\Response\Message\MessageResponse;

/**
 * Class ViewMessageResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ViewMessageResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var MessageDataTransformer
     */
    protected $messageDataTransformer;

    /**
     * MessageDataTransformer constructor.
     * @param MessageDataTransformer $messageDataTransformer
     */
    public function __construct(MessageDataTransformer $messageDataTransformer)
    {
        $this->messageDataTransformer = $messageDataTransformer;
    }

    /**
     * @param array $value
     * @return MessageResponse
     */
    public function transform($value)
    {
        $response = new MessageResponse();

        $message = $this->messageDataTransformer->transform($value['message']);

        $response->setMessage($message);

        return $response;
    }

    /**
     * @param MessageResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
