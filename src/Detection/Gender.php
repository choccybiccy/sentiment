<?php

namespace Choccybiccy\Sentiment\Detection;

/**
 * Class Gender
 * @package Choccybiccy\Sentiment\Detection
 */
class Gender extends AbstractDetection
{

    const DETECTION_MALE = "male";
    const DETECTION_FEMALE = "female";

    /**
     * @var string
     */
    protected $endpoint = "GenderDetection";
}
