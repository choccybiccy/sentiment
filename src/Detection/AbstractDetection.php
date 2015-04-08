<?php

namespace Choccybiccy\Sentiment\Detection;

use Choccybiccy\Sentiment\AbstractSentiment;

/**
 * Class Adult
 * @package Choccybiccy\Sentiment\Detection
 */
abstract class AbstractDetection extends AbstractSentiment implements DetectionInterface
{

    /**
     * Detect content in a string
     *
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function detect($string)
    {
        $this->addData("text", $string);
        return $this->request();
    }
}