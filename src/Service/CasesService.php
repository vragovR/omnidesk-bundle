<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\Configuration\CreateCasesRequestConfiguration;
use OmnideskBundle\Configuration\GetCasesRequestConfiguration;
use OmnideskBundle\Configuration\ViewCasesRequestConfiguration;
use OmnideskBundle\DataTransformer\Request\CreateCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\GetCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\ViewCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\CasesResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\GetCasesResponseDataTransformer;
use OmnideskBundle\Request\Cases\CreateCasesRequest;
use OmnideskBundle\Request\Cases\GetCasesRequest;
use OmnideskBundle\Request\Cases\ViewCasesRequest;
use OmnideskBundle\Response\Cases\CasesResponse;
use OmnideskBundle\Response\Cases\GetCasesResponse;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;

/**
 * Class CasesService
 * @package OmnideskBundle\Service
 */
class CasesService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var CreateCasesRequestDataTransformer
     */
    protected $createCasesRequestDataTransformer;

    /**
     * @var GetCasesRequestDataTransformer
     */
    protected $getCasesRequestDataTransformer;

    /**
     * @var ViewCasesRequestDataTransformer
     */
    protected $viewCasesRequestDataTransformer;

    /**
     * @var CasesResponseDataTransformer
     */
    protected $casesResponseDataTransformer;

    /**
     * @var GetCasesResponseDataTransformer
     */
    protected $getCasesResponseDataTransformer;

    /**
     * CasesService constructor.
     * @param RequestService                    $requestService
     * @param CreateCasesRequestDataTransformer $createCasesRequestDataTransformer
     * @param GetCasesRequestDataTransformer    $getCasesRequestDataTransformer
     * @param ViewCasesRequestDataTransformer   $viewCasesRequestDataTransformer
     * @param CasesResponseDataTransformer      $casesResponseDataTransformer
     * @param GetCasesResponseDataTransformer   $getCasesResponseDataTransformer
     */
    public function __construct(
        RequestService $requestService,
        CreateCasesRequestDataTransformer $createCasesRequestDataTransformer,
        GetCasesRequestDataTransformer $getCasesRequestDataTransformer,
        ViewCasesRequestDataTransformer $viewCasesRequestDataTransformer,
        CasesResponseDataTransformer $casesResponseDataTransformer,
        GetCasesResponseDataTransformer $getCasesResponseDataTransformer
    ) {
        $this->requestService = $requestService;
        $this->createCasesRequestDataTransformer = $createCasesRequestDataTransformer;
        $this->getCasesRequestDataTransformer = $getCasesRequestDataTransformer;
        $this->viewCasesRequestDataTransformer = $viewCasesRequestDataTransformer;
        $this->casesResponseDataTransformer = $casesResponseDataTransformer;
        $this->getCasesResponseDataTransformer = $getCasesResponseDataTransformer;

    }

    /**
     * @param CreateCasesRequest $request
     * @return CasesResponse
     */
    public function create(CreateCasesRequest $request)
    {
        $processor = new Processor();
        $configuration = new CreateCasesRequestConfiguration();
        $params = $this->createCasesRequestDataTransformer->transform($request);

        try {
            $params = $processor->processConfiguration($configuration, ['params' => array_filter($params)]);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->post('cases', $params);

        return $this->casesResponseDataTransformer->transform($result);
    }

    /**
     * @param GetCasesRequest $request
     * @return GetCasesResponse
     */
    public function get(GetCasesRequest $request)
    {
        $processor = new Processor();
        $configuration = new GetCasesRequestConfiguration();
        $params = $this->getCasesRequestDataTransformer->transform($request);

        try {
            $params = $processor->processConfiguration($configuration, ['params' => array_filter($params)]);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get('cases', $params);

        return $this->getCasesResponseDataTransformer->transform($result);
    }

    /**
     * @param ViewCasesRequest $request
     * @return CasesResponse
     */
    public function view(ViewCasesRequest $request)
    {
        $processor = new Processor();
        $configuration = new ViewCasesRequestConfiguration();
        $params = $this->viewCasesRequestDataTransformer->transform($request);

        try {
            $params = $processor->processConfiguration($configuration, ['params' => array_filter($params)]);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get("cases/{$params['case_id']}", []);

        return $this->casesResponseDataTransformer->transform($result);
    }
}
