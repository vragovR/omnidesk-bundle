<?php
namespace OmnideskBundle\Factory\Message;

use OmnideskBundle\DataTransformer\Request\Message\AddMessageRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Message\ListMessageRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\Message\ListMessageResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\Message\ViewMessageResponseDataTransformer;
use OmnideskBundle\Exception\BadDataTransformerFactoryException;
use OmnideskBundle\Factory\AbstractDataTransformerFactory;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class MessageDataTransformerFactory
 * @package OmnideskBundle\Factory\Message
 */
class MessageDataTransformerFactory extends AbstractDataTransformerFactory
{
    /**
     * CasesService constructor.
     * @param AddMessageRequestDataTransformer   $addRequest
     * @param ListMessageRequestDataTransformer  $listRequest
     * @param ListMessageResponseDataTransformer $listResponse
     * @param ViewMessageResponseDataTransformer $viewResponse
     */
    public function __construct(
        AddMessageRequestDataTransformer $addRequest,
        ListMessageRequestDataTransformer $listRequest,
        ListMessageResponseDataTransformer $listResponse,
        ViewMessageResponseDataTransformer $viewResponse
    ) {
        $this->addRequest = $addRequest;
        $this->listRequest = $listRequest;
        $this->viewResponse = $viewResponse;
        $this->listResponse = $listResponse;
    }

    /**
     * @param string $type
     * @return DataTransformerInterface
     * @throws BadDataTransformerFactoryException
     */
    public function get($type)
    {
        switch ($type) {
            case self::REQUEST_ADD:
                return $this->addRequest;
            case self::REQUEST_LIST:
                return $this->listRequest;
            case self::RESPONSE_LIST:
                return $this->listResponse;
            case self::RESPONSE_VIEW:
                return $this->viewResponse;
            default:
                throw new BadDataTransformerFactoryException();
        }
    }
}
