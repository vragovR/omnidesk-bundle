<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\Configuration\GetMessagesRequestConfiguration;
use OmnideskBundle\DataTransformer\Request\GetMessagesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\GetMessagesResponseDataTransformer;
use OmnideskBundle\Request\Message\GetMessagesRequest;
use OmnideskBundle\Response\Message\GetMessagesResponse;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;

/**
 * Class MessageService
 * @package OmnideskBundle\Service
 */
class MessageService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var GetMessagesRequestDataTransformer
     */
    protected $getMessagesRequestDataTransformer;

    /**
     * @var GetMessagesResponseDataTransformer
     */
    protected $getMessagesResponseDataTransformer;

    /**
     * MessageService constructor.
     * @param RequestService                     $requestService
     * @param GetMessagesRequestDataTransformer  $getMessagesRequestDataTransformer
     * @param GetMessagesResponseDataTransformer $getMessagesResponseDataTransformer
     */
    public function __construct(
        RequestService $requestService,
        GetMessagesRequestDataTransformer $getMessagesRequestDataTransformer,
        GetMessagesResponseDataTransformer $getMessagesResponseDataTransformer
    ) {
        $this->requestService = $requestService;
        $this->getMessagesRequestDataTransformer = $getMessagesRequestDataTransformer;
        $this->getMessagesResponseDataTransformer = $getMessagesResponseDataTransformer;
    }

    /**
     * @param GetMessagesRequest $request
     * @return GetMessagesResponse
     */
    public function get(GetMessagesRequest $request)
    {
        $processor = new Processor();
        $configuration = new GetMessagesRequestConfiguration();
        $params = $this->getMessagesRequestDataTransformer->transform($request);

        try {
            $params = $processor->processConfiguration($configuration, ['params' => array_filter($params)]);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get("cases/{$params['case_id']}/messages", $params);

        return $this->getMessagesResponseDataTransformer->transform($result);
    }
}
