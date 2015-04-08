<?php

namespace Choccybiccy\Sentiment\Analysis;

/**
 * Interface AnalysisInterface
 * @package Choccybiccy\Sentiment\Analysis
 */
interface AnalysisInterface
{

    /**
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function analyse($string);
}
