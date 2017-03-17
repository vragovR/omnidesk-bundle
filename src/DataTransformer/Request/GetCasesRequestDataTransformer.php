<?php
namespace OmnideskBundle\DataTransformer\Request;

use OmnideskBundle\Request\Cases\CreateCasesRequest;
use OmnideskBundle\Request\Cases\GetCasesRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class GetCasesDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class GetCasesRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param GetCasesRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'page' => $value->getPage(),
            'limit' => $value->getLimit(),
            'user_id' => $value->getUserId(),
            'user_email' => $value->getUserEmail(),
            'user_phone' => $value->getUserPhone(),
            'subject' => $value->getSubject(),
            'staff_id' => $value->getStaffId(),
            'group_id' => $value->getGroupId(),
            'channel' => $value->getChannel(),
            'priority' => $value->getPriority(),
            'status' => $value->getStatus(),
            'custom_fields' => $value->getCustomFields(),
            'labels' => $value->getLabels(),
            'sort' => $value->getSort(),
        ];
    }

    /**
     * @param array $value
     * @return CreateCasesRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
