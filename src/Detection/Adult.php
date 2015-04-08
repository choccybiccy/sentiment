<?php

namespace Choccybiccy\Sentiment\Detection;

/**
 * Class Adult
 * @package Choccybiccy\Sentiment\Detection
 */
class Adult extends AbstractDetection
{

    const DETECTION_ADULT = "adult";
    const DETECTION_NONADULT = "noadult";

    /**
     * @var string
     */
    protected $endpoint = "AdultContentDetection";
}
