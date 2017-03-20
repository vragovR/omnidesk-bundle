<?php
namespace OmnideskBundle\DataTransformer\Response\Staff;

use OmnideskBundle\DataTransformer\Entity\StaffDataTransformer;
use OmnideskBundle\Response\Staff\ListStaffResponse;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ListStaffResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ListStaffResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var StaffDataTransformer
     */
    protected $staffDataTransformer;

    /**
     * GetCasesResponseDataTransformer constructor.
     * @param StaffDataTransformer $staffDataTransformer
     */
    public function __construct(StaffDataTransformer $staffDataTransformer)
    {
        $this->staffDataTransformer = $staffDataTransformer;
    }

    /**
     * @param array $value
     * @return ListStaffResponse
     */
    public function transform($value)
    {
        $response = new ListStaffResponse();

        foreach ($value as $item) {
            if (isset($item['staff'])) {
                $response->addStaff($this->staffDataTransformer->transform($item['staff']));
            }
        }

        $response->setTotalCount($value['total_count']);

        return $response;
    }

    /**
     * @param ListStaffResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
