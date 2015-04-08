<?php

namespace Choccybiccy\Sentiment;

use Choccybiccy\Sentiment\Exception\NonexistentEndpointException;
use GuzzleHttp\Client;

/**
 * Class Factory
 * @package Choccybiccy\Sentiment
 */
class Factory
{

    const ENDPOINT_ANALYSIS_SENTIMENT = "Analysis\\Sentiment";
    const ENDPOINT_ANALYSIS_SUBJECTIVITY = "Analysis\\Subjectivity";
    const ENDPOINT_ASSESSMENT_READABILITY = "Assessment\\Readability";
    const ENDPOINT_CLASSIFICATION_TOPIC = "Classification\\Topic";
    const ENDPOINT_COMPARISON_SIMILARITY = "Comparison\\Similarity";
    const ENDPOINT_DETECTION_ADULT = "Detection\\Adult";
    const ENDPOINT_DETECTION_COMMERCIAL = "Detection\\Commercial";
    const ENDPOINT_DETECTION_EDUCATIONAL = "Detection\\Educational";
    const ENDPOINT_DETECTION_GENDER = "Detection\\Gender";
    const ENDPOINT_DETECTION_LANGUAGE = "Detection\\Language";
    const ENDPOINT_DETECTION_SPAM = "Detection\\Spam";
    const ENDPOINT_EXTRACTION_KEYWORD = "Extraction\\Keyword";
    const ENDPOINT_EXTRACTION_TEXT = "Extraction\\Text";

    /**
     * @param $endpoint
     * @param array $data
     * @throws NonexistentEndpointException
     * @throws AbstractSentiment
     */
    public function create($endpoint, $apiKey, array $data = array())
    {

        $className = __NAMESPACE__ . "\\" . $endpoint;
        if(!class_exists($className)) {
            throw new NonexistentEndpointException("No such endpoint '" . $endpoint . "'");
        }

        $client = new Client;
        $endpoint = new $className($apiKey, $client);

        $endpoint->setData($data);

        return $endpoint;

    }
}