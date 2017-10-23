<?php
namespace OmnideskBundle\DataTransformer\Response\Group;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\GroupDataTransformer;
use OmnideskBundle\Response\Group\GroupResponse;

/**
 * Class ViewCasesResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ViewGroupResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var GroupDataTransformer
     */
    protected $groupDataTransformer;

    /**
     * CasesResponseDataTransformer constructor.
     * @param GroupDataTransformer $groupDataTransformer
     */
    public function __construct(GroupDataTransformer $groupDataTransformer)
    {
        $this->groupDataTransformer = $groupDataTransformer;
    }

    /**
     * @param array $value
     * @return GroupResponse
     */
    public function transform($value)
    {
        $response = new GroupResponse();

        $case = $this->groupDataTransformer->transform($value['group']);

        $response->setGroup($case);

        return $response;
    }

    /**
     * @param GroupResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
