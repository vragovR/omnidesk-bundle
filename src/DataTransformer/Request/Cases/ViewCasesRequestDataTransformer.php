<?php
namespace OmnideskBundle\DataTransformer\Request\Cases;

use OmnideskBundle\Request\Cases\ViewCasesRequest;
use Symfony\Component\Form\DataTransformerInterface;

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
