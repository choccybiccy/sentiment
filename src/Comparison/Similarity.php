<?php

namespace Choccybiccy\Sentiment\Comparison;

use Choccybiccy\Sentiment\AbstractSentiment;

/**
 * Class Similarity
 * @package Choccybiccy\Sentiment\Comparison
 */
class Similarity extends AbstractSentiment implements ComparisonInterface
{

    const SIMILARITY_ALGORITHM_OLIVER = "Oliver";
    const SIMILARITY_ALGORITHM_SHINGLE = "Shingle";

    /**
     * @var string
     */
    protected $endpoint = "DocumentSimilarity";

    /**
     * Classify the topic of the string
     *
     * @param string $stringA
     * @param string $stringB
     * @return \Choccybiccy\Sentiment\Response
     */
    public function compare($stringA, $stringB)
    {
        $this->addData("original", $stringA);
        $this->addData("copy", $stringB);
        return $this->request();
    }
}