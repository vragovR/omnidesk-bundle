<?php
namespace OmnideskBundle\DataTransformer\Response\Cases;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\CasesDataTransformer;
use OmnideskBundle\Response\Cases\GetCasesResponse;

/**
 * Class ListCasesResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ListCasesResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var CasesDataTransformer
     */
    protected $casesDataTransformer;

    /**
     * GetCasesResponseDataTransformer constructor.
     * @param CasesDataTransformer $casesDataTransformer
     */
    public function __construct(CasesDataTransformer $casesDataTransformer)
    {
        $this->casesDataTransformer = $casesDataTransformer;
    }

    /**
     * @param array $value
     * @return GetCasesResponse
     */
    public function transform($value)
    {
        $response = new GetCasesResponse();

        foreach ($value as $item) {
            if (isset($item['case'])) {
                $response->addCases($this->casesDataTransformer->transform($item['case']));
            }
        }

        $response->setTotalCount($value['total_count'] ?? 0);

        return $response;
    }

    /**
     * @param GetCasesResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
