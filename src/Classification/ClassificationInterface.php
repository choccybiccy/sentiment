<?php

namespace Choccybiccy\Sentiment\Classification;

/**
 * Interface ClassificationInterface
 * @package Choccybiccy\Sentiment\Classification
 */
interface ClassificationInterface
{

    /**
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function classify($string);
}
