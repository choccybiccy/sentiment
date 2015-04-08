<?php

namespace Choccybiccy\Sentiment\Comparison;

/**
 * Interface ComparisonInterface
 * @package Choccybiccy\Sentiment\Comparison
 */
interface ComparisonInterface
{

    /**
     * @param string $stringA
     * @param string $stringB
     * @return \Choccybiccy\Sentiment\Response
     */
    public function compare($stringA, $stringB);
}
