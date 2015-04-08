<?php

namespace Choccybiccy\Sentiment\Extraction;

use Choccybiccy\Sentiment\AbstractSentiment;

/**
 * Class AbstractExtraction
 * @package Choccybiccy\Sentiment\Extraction
 */
abstract class AbstractExtraction extends AbstractSentiment implements ExtractionInterface
{

    /**
     * Extract keywords from a string
     *
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function extract($string)
    {
        $this->addData("text", $string);
        return $this->request();
    }
}
