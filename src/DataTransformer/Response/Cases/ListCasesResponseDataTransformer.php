<?php
namespace OmnideskBundle\DataTransformer\Response\Cases;

use OmnideskBundle\DataTransformer\Entity\CasesDataTransformer;
use OmnideskBundle\Response\Cases\GetCasesResponse;
use Symfony\Component\Form\DataTransformerInterface;

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
     */
    public function __construct()
    {
        $this->casesDataTransformer = new CasesDataTransformer();
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

        $response->setTotalCount($value['total_count']);

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
