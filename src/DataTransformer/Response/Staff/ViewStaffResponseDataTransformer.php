<?php
namespace OmnideskBundle\DataTransformer\Response\Staff;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\StaffDataTransformer;
use OmnideskBundle\Response\Staff\StaffResponse;

/**
 * Class ViewStaffResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ViewStaffResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var StaffDataTransformer
     */
    protected $staffDataTransformer;

    /**
     * StaffDataTransformer constructor.
     * @param StaffDataTransformer $staffDataTransformer
     */
    public function __construct(StaffDataTransformer $staffDataTransformer)
    {
        $this->staffDataTransformer = $staffDataTransformer;
    }

    /**
     * @param array $value
     * @return StaffResponse
     */
    public function transform($value)
    {
        $response = new StaffResponse();

        $staff = $this->staffDataTransformer->transform($value['staff']);

        $response->setStaff($staff);

        return $response;
    }

    /**
     * @param StaffResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
