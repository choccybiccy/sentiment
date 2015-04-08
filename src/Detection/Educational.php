<?php

namespace Choccybiccy\Sentiment\Detection;

/**
 * Class Educational
 * @package Choccybiccy\Sentiment\Detection
 */
class Educational extends AbstractDetection
{

    const DETECTION_EDUCATIONAL = "educational";
    const DETECTION_NONEDUCATIONAL = "noneducational";

    /**
     * @var string
     */
    protected $endpoint = "EducationalDetection";
}