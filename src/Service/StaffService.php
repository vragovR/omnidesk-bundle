<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\Factory\Staff\StaffConfigurationFactory;
use OmnideskBundle\Factory\Staff\StaffDataTransformerFactory;
use OmnideskBundle\Request\Staff\AddStaffRequest;
use OmnideskBundle\Request\Staff\EditStaffRequest;
use OmnideskBundle\Request\Staff\ListStaffRequest;
use OmnideskBundle\Request\Staff\ViewStaffRequest;
use OmnideskBundle\Response\Staff\ListStaffResponse;
use OmnideskBundle\Response\Staff\StaffResponse;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * Class StaffService
 * @package OmnideskBundle\Service
 */
class StaffService extends AbstractService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var StaffDataTransformerFactory
     */
    protected $transformerFactory;

    /**
     * @var StaffConfigurationFactory
     */
    protected $configurationFactory;

    /**
     * StaffService constructor.
     * @param RequestService              $requestService
     * @param StaffDataTransformerFactory $transformerFactory
     * @param StaffConfigurationFactory   $configurationFactory
     */
    public function __construct(
        RequestService $requestService,
        StaffDataTransformerFactory $transformerFactory,
        StaffConfigurationFactory $configurationFactory
    ) {
        $this->requestService = $requestService;
        $this->transformerFactory = $transformerFactory;
        $this->configurationFactory = $configurationFactory;
    }

    /**
     * @param AddStaffRequest $request
     * @return StaffResponse
     */
    public function add(AddStaffRequest $request)
    {
        $transformer = $this->transformerFactory->get(StaffDataTransformerFactory::REQUEST_ADD);
        $configuration = $this->configurationFactory->get(StaffConfigurationFactory::CONFIGURATION_ADD);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->post('staff', $params);

        return $this->transformerFactory->get(StaffDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param EditStaffRequest $request
     * @return StaffResponse
     */
    public function edit(EditStaffRequest $request)
    {
        $transformer = $this->transformerFactory->get(StaffDataTransformerFactory::REQUEST_EDIT);
        $configuration = $this->configurationFactory->get(StaffConfigurationFactory::CONFIGURATION_EDIT);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("staff/{$params['staff_id']}", $params);

        return $this->transformerFactory->get(StaffDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ListStaffRequest $request
     * @return ListStaffResponse
     */
    public function lists(ListStaffRequest $request)
    {
        $transformer = $this->transformerFactory->get(StaffDataTransformerFactory::REQUEST_LIST);
        $configuration = $this->configurationFactory->get(StaffConfigurationFactory::CONFIGURATION_LIST);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get('staff', $params);

        return $this->transformerFactory->get(StaffDataTransformerFactory::RESPONSE_LIST)->transform($result);
    }

    /**
     * @param ViewStaffRequest $request
     * @return StaffResponse
     */
    public function view(ViewStaffRequest $request)
    {
        $transformer = $this->transformerFactory->get(StaffDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(StaffConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get("staff/{$params['staff_id']}");

        return $this->transformerFactory->get(StaffDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewStaffRequest $request
     * @return StaffResponse
     */
    public function disable(ViewStaffRequest $request)
    {
        $transformer = $this->transformerFactory->get(StaffDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(StaffConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("staff/{$params['staff_id']}/disable");

        return $this->transformerFactory->get(StaffDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewStaffRequest $request
     * @return StaffResponse
     */
    public function enable(ViewStaffRequest $request)
    {
        $transformer = $this->transformerFactory->get(StaffDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(StaffConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("staff/{$params['staff_id']}/enable");

        return $this->transformerFactory->get(StaffDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewStaffRequest $request
     */
    public function delete(ViewStaffRequest $request)
    {
        $transformer = $this->transformerFactory->get(StaffDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(StaffConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $this->requestService->delete("staff/{$params['staff_id']}");
    }
}
