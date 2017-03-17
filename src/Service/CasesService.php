<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\Configuration\CreateCasesRequestConfiguration;
use OmnideskBundle\Configuration\GetCasesRequestConfiguration;
use OmnideskBundle\DataTransformer\Request\CreateCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\GetCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\CreateCasesResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\GetCasesResponseDataTransformer;
use OmnideskBundle\Request\Cases\CreateCasesRequest;
use OmnideskBundle\Request\Cases\GetCasesRequest;
use OmnideskBundle\Response\Cases\CreateCasesResponse;
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
     * @var CreateCasesResponseDataTransformer
     */
    protected $createCasesResponseDataTransformer;

    /**
     * @var GetCasesRequestDataTransformer
     */
    protected $getCasesRequestDataTransformer;

    /**
     * @var GetCasesResponseDataTransformer
     */
    protected $getCasesResponseDataTransformer;

    /**
     * CasesService constructor.
     * @param RequestService                     $requestService
     * @param CreateCasesRequestDataTransformer  $createCasesRequestDataTransformer
     * @param CreateCasesResponseDataTransformer $createCasesResponseDataTransformer
     * @param GetCasesRequestDataTransformer     $getCasesRequestDataTransformer
     * @param GetCasesResponseDataTransformer    $getCasesResponseDataTransformer
     */
    public function __construct(
        RequestService $requestService,
        CreateCasesRequestDataTransformer $createCasesRequestDataTransformer,
        CreateCasesResponseDataTransformer $createCasesResponseDataTransformer,
        GetCasesRequestDataTransformer $getCasesRequestDataTransformer,
        GetCasesResponseDataTransformer $getCasesResponseDataTransformer
    ) {
        $this->requestService = $requestService;
        $this->createCasesRequestDataTransformer = $createCasesRequestDataTransformer;
        $this->createCasesResponseDataTransformer = $createCasesResponseDataTransformer;
        $this->getCasesRequestDataTransformer = $getCasesRequestDataTransformer;
        $this->getCasesResponseDataTransformer = $getCasesResponseDataTransformer;
    }

    /**
     * @param CreateCasesRequest $request
     * @return CreateCasesResponse
     */
    public function create(CreateCasesRequest $request)
    {
        $processor = new Processor();
        $configuration = new CreateCasesRequestConfiguration();
        $params = $this->createCasesRequestDataTransformer->transform($request);

        try {
            $params = $processor->processConfiguration($configuration, ['params' => $params]);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->post('cases', $params);

        return $this->createCasesResponseDataTransformer->transform($result);
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
            $params = $processor->processConfiguration($configuration, ['params' => $params]);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get('cases', $params);

        return $this->getCasesResponseDataTransformer->transform($result);
    }
}
