<?php
namespace OmnideskBundle\Service;

use GuzzleHttp\Exception\ClientException;
use OmnideskBundle\Exception\CasesNotFoundException;
use OmnideskBundle\Factory\CasesConfigurationFactory;
use OmnideskBundle\Factory\CasesDataTransformerFactory;
use OmnideskBundle\Request\Cases\AddCasesRequest;
use OmnideskBundle\Request\Cases\EditCasesRequest;
use OmnideskBundle\Request\Cases\ListCasesRequest;
use OmnideskBundle\Request\Cases\ViewCasesRequest;
use OmnideskBundle\Response\Cases\CasesResponse;
use OmnideskBundle\Response\Cases\GetCasesResponse;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * Class CasesService
 * @package OmnideskBundle\Service
 */
class CasesService extends AbstractService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var CasesDataTransformerFactory
     */
    protected $transformerFactory;

    /**
     * @var CasesConfigurationFactory
     */
    protected $configurationFactory;

    /**
     * CasesService constructor.
     * @param RequestService              $requestService
     * @param CasesDataTransformerFactory $transformerFactory
     * @param CasesConfigurationFactory   $configurationFactory
     */
    public function __construct(
        RequestService $requestService,
        CasesDataTransformerFactory $transformerFactory,
        CasesConfigurationFactory $configurationFactory
    ) {
        $this->requestService = $requestService;
        $this->transformerFactory = $transformerFactory;
        $this->configurationFactory = $configurationFactory;
    }

    /**
     * @param AddCasesRequest $request
     * @return CasesResponse
     */
    public function add(AddCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_ADD);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_ADD);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->post('cases', $params);

        return $this->transformerFactory->get(CasesDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param EditCasesRequest $request
     * @return CasesResponse
     */
    public function edit(EditCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_EDIT);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_EDIT);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("cases/{$params['case_id']}", $params);

        return $this->transformerFactory->get(CasesDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ListCasesRequest $request
     * @return GetCasesResponse
     */
    public function lists(ListCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_LIST);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_LIST);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get('cases', $params);

        return $this->transformerFactory->get(CasesDataTransformerFactory::RESPONSE_LIST)->transform($result);
    }

    /**
     * @param ViewCasesRequest $request
     * @return CasesResponse
     */
    public function view(ViewCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get("cases/{$params['case_id']}");

        return $this->transformerFactory->get(CasesDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewCasesRequest $request
     * @return CasesResponse
     * @throws CasesNotFoundException
     */
    public function trash(ViewCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("cases/{$params['case_id']}/trash");

        return $this->transformerFactory->get(CasesDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewCasesRequest $request
     * @return CasesResponse
     * @throws CasesNotFoundException
     */
    public function spam(ViewCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("cases/{$params['case_id']}/spam");

        return $this->transformerFactory->get(CasesDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewCasesRequest $request
     * @return CasesResponse
     * @throws CasesNotFoundException
     */
    public function restore(ViewCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("cases/{$params['case_id']}/restore");

        return $this->transformerFactory->get(CasesDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewCasesRequest $request
     * @throws CasesNotFoundException
     */
    public function delete(ViewCasesRequest $request)
    {
        $transformer = $this->transformerFactory->get(CasesDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(CasesConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        try {
            $this->requestService->delete("cases/{$params['case_id']}");
        } catch (ClientException $exception) {
            throw $exception;
        }
    }
}
