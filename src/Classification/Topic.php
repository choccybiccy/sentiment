<?php

namespace Choccybiccy\Sentiment\Classification;

use Choccybiccy\Sentiment\AbstractSentiment;

/**
 * Class Topic
 * @package Choccybiccy\Sentiment\Classification
 */
class Topic extends AbstractSentiment implements ClassificationInterface
{

    const TOPIC_ARTS = "Arts";
    const TOPIC_BUSINESS_ECONOMY = "Business & Economy";
    const TOPIC_COMPUTERS_TECHNOLOGY = "Computers & Technology";
    const TOPIC_HEALTH = "Health";
    const TOPIC_HOME_DOMESTIC_LIFE = "Home & Domestic Life";
    const TOPIC_NEWS = "News";
    const TOPIC_RECREATION_ACTIVITIES = "Recreation & Activities";
    const TOPIC_REFERENCE_EDUCATION = "Reference & Education";
    const TOPIC_SCIENCE = "Science";
    const TOPIC_SHOPPING = "Shopping";
    const TOPIC_SOCIETY = "Society";
    const TOPIC_SPORTS = "Sports";

    /**
     * @var string
     */
    protected $endpoint = "TopicClassification";

    /**
     * Classify the topic of the string
     *
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function classify($string)
    {
        $this->addData("text", $string);
        return $this->request();
    }
}