<?php
namespace OmnideskBundle\DataTransformer\Response\Message;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Entity\MessageDataTransformer;
use OmnideskBundle\Response\Message\ListMessageResponse;

/**
 * Class ListMessageResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ListMessageResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var MessageDataTransformer
     */
    protected $messageDataTransformer;

    /**
     * GetCasesResponseDataTransformer constructor.
     * @param MessageDataTransformer $messageDataTransformer
     */
    public function __construct(MessageDataTransformer $messageDataTransformer)
    {
        $this->messageDataTransformer = $messageDataTransformer;
    }

    /**
     * @param array $value
     * @return ListMessageResponse
     */
    public function transform($value)
    {
        $response = new ListMessageResponse();

        foreach ($value as $item) {
            if (isset($item['message'])) {
                $response->addMessage($this->messageDataTransformer->transform($item['message']));
            }
        }

        $response->setTotalCount($value['total_count']);

        return $response;
    }

    /**
     * @param ListMessageResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
