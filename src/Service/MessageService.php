<?php
namespace OmnideskBundle\Service;

use GuzzleHttp\Exception\ClientException;
use OmnideskBundle\Exception\StaffNotActiveException;
use OmnideskBundle\Factory\Message\MessageConfigurationFactory;
use OmnideskBundle\Factory\Message\MessageDataTransformerFactory;
use OmnideskBundle\Request\Message\AddMessageRequest;
use OmnideskBundle\Request\Message\ListMessageRequest;
use OmnideskBundle\Response\Message\ListMessageResponse;
use OmnideskBundle\Response\Message\MessageResponse;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * Class MessageService
 * @package OmnideskBundle\Service
 */
class MessageService extends AbstractService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var MessageDataTransformerFactory
     */
    protected $transformerFactory;

    /**
     * @var MessageConfigurationFactory
     */
    protected $configurationFactory;

    /**
     * MessageService constructor.
     * @param RequestService                $requestService
     * @param MessageDataTransformerFactory $transformerFactory
     * @param MessageConfigurationFactory   $configurationFactory
     */
    public function __construct(
        RequestService $requestService,
        MessageDataTransformerFactory $transformerFactory,
        MessageConfigurationFactory $configurationFactory
    ) {
        $this->requestService = $requestService;
        $this->transformerFactory = $transformerFactory;
        $this->configurationFactory = $configurationFactory;
    }

    /**
     * @param AddMessageRequest $request
     * @return MessageResponse
     * @throws StaffNotActiveException
     */
    public function add(AddMessageRequest $request)
    {
        $transformer = $this->transformerFactory->get(MessageDataTransformerFactory::REQUEST_ADD);
        $configuration = $this->configurationFactory->get(MessageConfigurationFactory::CONFIGURATION_ADD);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $transformer = $this->transformerFactory->get(MessageDataTransformerFactory::RESPONSE_VIEW);

        try {
            if (isset($params['attachments']) && !empty($params['attachments'])) {
                return $transformer->transform($this->requestService->postMultipart("cases/{$params['case_id']}/messages", 'message', $params));
            }

            return $transformer->transform($this->requestService->post("cases/{$params['case_id']}/messages", ['message' => $params]));
        } catch (ClientException $exception) {
            $contents = json_decode($exception->getResponse()->getBody(), JSON_UNESCAPED_UNICODE);

            if ($contents['error'] === MessageResponse::ERROR_STAFF_NOT_ACTIVE) {
                throw new StaffNotActiveException();
            }

            throw $exception;
        }
    }

    /**
     * @param ListMessageRequest $request
     * @return ListMessageResponse
     */
    public function lists(ListMessageRequest $request)
    {
        $transformer = $this->transformerFactory->get(MessageDataTransformerFactory::REQUEST_LIST);
        $configuration = $this->configurationFactory->get(MessageConfigurationFactory::CONFIGURATION_LIST);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get("cases/{$params['case_id']}/messages", $params);

        return $this->transformerFactory->get(MessageDataTransformerFactory::RESPONSE_LIST)->transform($result);
    }
}
