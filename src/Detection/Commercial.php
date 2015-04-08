<?php

namespace Choccybiccy\Sentiment\Detection;

/**
 * Class Commercial
 * @package Choccybiccy\Sentiment\Detection
 */
class Commercial extends AbstractDetection
{

    const DETECTION_COMMERCIAL = "commercial";
    const DETECTION_NONCOMMERCIAL = "noncommercial";

    /**
     * @var string
     */
    protected $endpoint = "CommercialDetection";
}
