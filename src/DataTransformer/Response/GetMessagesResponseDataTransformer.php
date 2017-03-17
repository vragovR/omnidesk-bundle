<?php
namespace OmnideskBundle\DataTransformer\Response;

use OmnideskBundle\DataTransformer\Entity\MessageDataTransformer;
use OmnideskBundle\Response\Cases\GetCasesResponse;
use OmnideskBundle\Response\Message\GetMessagesResponse;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class GetMessageResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class GetMessagesResponseDataTransformer implements DataTransformerInterface
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
     * @return GetMessagesResponse
     */
    public function transform($value)
    {
        $response = new GetMessagesResponse();

        foreach ($value as $item) {
            if (isset($item['message'])) {
                $response->addMessage($this->messageDataTransformer->transform($item['message']));
            }
        }

        $response->setTotalCount($value['total_count']);

        return $response;
    }

    /**
     * @param GetCasesResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
