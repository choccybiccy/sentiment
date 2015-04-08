<?php

namespace Choccybiccy\Sentiment\Detection;

/**
 * Interface DetectionInterface
 * @package Choccybiccy\Sentiment\Detection
 */
interface DetectionInterface
{

    /**
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function detect($string);
}