<?php

namespace Choccybiccy\Sentiment\Extraction;

/**
 * Interface ExtractionInterface
 * @package Choccybiccy\Sentiment\Extraction
 */
interface ExtractionInterface
{

    /**
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function extract($string);
}