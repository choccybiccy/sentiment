<?php

namespace Choccybiccy\Sentiment;

use GuzzleHttp\ClientInterface;

/**
 * Class AbstractSentiment
 * @package Choccybiccy\Sentiment
 */
abstract class AbstractSentiment
{

    /**
     * @var string
     */
    protected $apiUrl = "http://api.datumbox.com/";

    /**
     * @var string
     */
    protected $apiVersion = "1.0";

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $data = array();

    /**
     * @param $apiKey
     * @param ClientInterface $httpClient
     */
    public function __construct($apiKey, ClientInterface $httpClient)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
    }

    /**
     * Send request
     *
     * @param array $data
     * @return Response
     */
    public function request(array $data = array())
    {
        if(count($data)) {
            $this->setData($data);
        }
        $url = $this->buildUrl();
        $data = $this->getData();
        $response = $this->httpClient->post(
            $url,
            array(
                "body" => $data,
            )
        );
        return new Response($response);
    }

    /**
     * Get data to send to API
     *
     * @return array
     */
    public function getData()
    {
        return array_merge(array("api_key" => $this->apiKey), $this->data);
    }

    /**
     * Set data
     *
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Add data
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function addData($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * Build an API url
     *
     * @return string
     */
    protected function buildUrl()
    {
        return $this->apiUrl . $this->apiVersion . "/" . $this->endpoint . ".json";
    }
}