<?php
namespace OmnideskBundle\DataTransformer\Response\Group;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\GroupDataTransformer;
use OmnideskBundle\Response\Group\GetGroupResponse;

/**
 * Class ListGroupResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response\Group
 */
class ListGroupResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var GroupDataTransformer
     */
    protected $groupDataTransformer;

    /**
     * ListGroupResponseDataTransformer constructor.
     * @param GroupDataTransformer $groupDataTransformer
     */
    public function __construct(GroupDataTransformer $groupDataTransformer)
    {
        $this->groupDataTransformer = $groupDataTransformer;
    }

    /**
     * @param array $value
     * @return GetGroupResponse
     */
    public function transform($value)
    {
        $response = new GetGroupResponse();

        foreach ($value as $item) {
            if (isset($item['group'])) {
                $response->addGroup($this->groupDataTransformer->transform($item['group']));
            }
        }

        $response->setTotalCount($value['total_count'] ?? 0);

        return $response;
    }

    /**
     * @param GetGroupResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
