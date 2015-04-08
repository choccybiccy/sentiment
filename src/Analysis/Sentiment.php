<?php

namespace Choccybiccy\Sentiment\Analysis;

use Choccybiccy\Sentiment\AbstractSentiment;

/**
 * Class Sentiment
 * @package Choccybiccy\Sentiment\Analysis
 */
class Sentiment extends AbstractSentiment implements AnalysisInterface
{

    const SENTIMENT_POSITIVE = "positive";
    const SENTIMENT_NEGATIVE = "negative";
    const SENTIMENT_NEUTRAL = "neutral";

    /**
     * @var string
     */
    protected $endpoint = "SentimentAnalysis";

    /**
     * Analyse the sentiment of a string
     *
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function analyse($string)
    {
        $this->addData("text", $string);
        return $this->request();
    }
}