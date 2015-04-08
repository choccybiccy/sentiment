<?php

namespace Choccybiccy\Sentiment\Detection;

/**
 * Class Spam
 * @package Choccybiccy\Sentiment\Detection
 */
class Spam extends AbstractDetection
{

    const DETECTION_SPAM = "spam";
    const DETECTION_NONSPAM = "nospam";

    /**
     * @var string
     */
    protected $endpoint = "SpamDetection";
}
