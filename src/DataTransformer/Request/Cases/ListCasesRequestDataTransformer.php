<?php
namespace OmnideskBundle\DataTransformer\Request\Cases;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Cases\AddCasesRequest;
use OmnideskBundle\Request\Cases\ListCasesRequest;

/**
 * Class ListCasesRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class ListCasesRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ListCasesRequest $value
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
     * @return AddCasesRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
