<?php
namespace OmnideskBundle\DataTransformer\Response\Cases;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\CasesDataTransformer;
use OmnideskBundle\Response\Cases\CasesResponse;

/**
 * Class ViewCasesResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ViewCasesResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var CasesDataTransformer
     */
    protected $casesDataTransformer;

    /**
     * CasesResponseDataTransformer constructor.
     * @param CasesDataTransformer $casesDataTransformer
     */
    public function __construct(CasesDataTransformer $casesDataTransformer)
    {
        $this->casesDataTransformer = $casesDataTransformer;
    }

    /**
     * @param array $value
     * @return CasesResponse
     */
    public function transform($value)
    {
        $response = new CasesResponse();

        $case = $this->casesDataTransformer->transform($value['case']);

        $response->setCases($case);

        return $response;
    }

    /**
     * @param CasesResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
