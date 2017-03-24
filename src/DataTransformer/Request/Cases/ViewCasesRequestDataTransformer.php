<?php
namespace OmnideskBundle\DataTransformer\Request\Cases;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\Cases\ViewCasesRequest;

/**
 * Class ViewCasesRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request\
 */
class ViewCasesRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param ViewCasesRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'case_id' => $value->getCaseId(),
        ];
    }

    /**
     * @param array $value
     * @return ViewCasesRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
