<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\Factory\Group\GroupConfigurationFactory;
use OmnideskBundle\Factory\Group\GroupDataTransformerFactory;
use OmnideskBundle\Request\Group\AddGroupRequest;
use OmnideskBundle\Request\Group\EditGroupRequest;
use OmnideskBundle\Request\Group\ListGroupRequest;
use OmnideskBundle\Request\Group\ViewGroupRequest;
use OmnideskBundle\Response\Group\GetGroupResponse;
use OmnideskBundle\Response\Group\GroupResponse;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * Class GroupService
 * @package OmnideskBundle\Service
 */
class GroupService extends AbstractService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var GroupDataTransformerFactory
     */
    protected $transformerFactory;

    /**
     * @var GroupConfigurationFactory
     */
    protected $configurationFactory;

    /**
     * GroupService constructor.
     * @param RequestService              $requestService
     * @param GroupDataTransformerFactory $transformerFactory
     * @param GroupConfigurationFactory   $configurationFactory
     */
    public function __construct(
        RequestService $requestService,
        GroupDataTransformerFactory $transformerFactory,
        GroupConfigurationFactory $configurationFactory
    ) {
        $this->requestService = $requestService;
        $this->transformerFactory = $transformerFactory;
        $this->configurationFactory = $configurationFactory;
    }

    /**
     * @param AddGroupRequest $request
     * @return GroupResponse
     */
    public function add(AddGroupRequest $request)
    {
        $transformer = $this->transformerFactory->get(GroupDataTransformerFactory::REQUEST_ADD);
        $configuration = $this->configurationFactory->get(GroupConfigurationFactory::CONFIGURATION_ADD);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->post('groups', ['group' => $params]);

        return $this->transformerFactory->get(GroupDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param EditGroupRequest $request
     * @return GroupResponse
     */
    public function edit(EditGroupRequest $request)
    {
        $transformer = $this->transformerFactory->get(GroupDataTransformerFactory::REQUEST_EDIT);
        $configuration = $this->configurationFactory->get(GroupConfigurationFactory::CONFIGURATION_EDIT);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("groups/{$params['group_id']}", ['group' => $params]);

        return $this->transformerFactory->get(GroupDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ListGroupRequest $request
     * @return GetGroupResponse
     */
    public function lists(ListGroupRequest $request)
    {
        $transformer = $this->transformerFactory->get(GroupDataTransformerFactory::REQUEST_LIST);
        $configuration = $this->configurationFactory->get(GroupConfigurationFactory::CONFIGURATION_LIST);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get('groups', $params);

        return $this->transformerFactory->get(GroupDataTransformerFactory::RESPONSE_LIST)->transform($result);
    }

    /**
     * @param ViewGroupRequest $request
     * @return GroupResponse
     */
    public function view(ViewGroupRequest $request)
    {
        $transformer = $this->transformerFactory->get(GroupDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(GroupConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get("groups/{$params['group_id']}");

        return $this->transformerFactory->get(GroupDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewGroupRequest $request
     * @return GroupResponse
     */
    public function disable(ViewGroupRequest $request)
    {
        $transformer = $this->transformerFactory->get(GroupDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(GroupConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("groups/{$params['group_id']}/disable");

        return $this->transformerFactory->get(GroupDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewGroupRequest $request
     * @return GroupResponse
     */
    public function enable(ViewGroupRequest $request)
    {
        $transformer = $this->transformerFactory->get(GroupDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(GroupConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("groups/{$params['group_id']}/enable");

        return $this->transformerFactory->get(GroupDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewGroupRequest $request
     * @return GroupResponse
     */
    public function delete(ViewGroupRequest $request)
    {
        $transformer = $this->transformerFactory->get(GroupDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(GroupConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $this->requestService->delete("groups/{$params['group_id']}");
    }
}
