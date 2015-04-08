<?php

namespace Choccybiccy\Sentiment\Assessment;

use Choccybiccy\Sentiment\AbstractSentiment;

/**
 * Class Readability
 * @package Choccybiccy\Sentiment\Assessment
 */
class Readability extends AbstractSentiment implements AssessmentInterface
{

    const READABILITY_BASIC = "basic";
    const READABILITY_INTERMEDIATE = "intermediate";
    const READABILITY_ADVANCED = "advanced";

    /**
     * @var string
     */
    protected $endpoint = "ReadabilityAssessment";

    /**
     * Assess the readability of the string
     *
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function assess($string)
    {
        $this->addData("text", $string);
        return $this->request();
    }
}