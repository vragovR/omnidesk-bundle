<?php
namespace OmnideskBundle\DataTransformer\Response;

use OmnideskBundle\DataTransformer\Entity\MessageDataTransformer;
use OmnideskBundle\Response\Cases\GetCasesResponse;
use OmnideskBundle\Response\Message\ListMessageResponse;
use Symfony\Component\Form\DataTransformerInterface;

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
     * @param GetCasesResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
