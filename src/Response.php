<?php

namespace Choccybiccy\Sentiment;

use Choccybiccy\Sentiment\Exception\InvalidArgumentException;
use GuzzleHttp\Message\ResponseInterface;

/**
 * Class Response
 * @package Choccybiccy\Sentiment
 */
class Response
{

    const ERROR_INVALID_API_VERSION = 1;
    const ERROR_INVALID_API_FUNCTION = 2;
    const ERROR_MISSING_PARAMETER = 3;
    const ERROR_UNEXPECTED_ERROR = 4;
    const ERROR_TIMESTAMP_EXPIRED = 5;
    const ERROR_INVALID_ACCOUNT = 6;
    const ERROR_ACCOUNT_NOT_ACTIVE = 7;
    const ERROR_INVALID_AUTHENTICATION_KEY = 8;
    const ERROR_INVALID_SUBSCRIPTION = 9;
    const ERROR_SERVICE_ACCESS_DENIED = 10;
    const ERROR_API_LIMIT_REACHED = 11;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var array
     */
    protected $responseData;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->responseData = $response->json();
    }

    /**
     * Is response successful
     *
     * @return bool
     */
    public function isSuccess()
    {
        return (bool) $this->responseData['output']['status'];
    }

    /**
     * Get response result
     *
     * If the result is an array, then you can optionally pass a key
     *
     * @param string|null $key
     * @return mixed
     */
    public function getResult($key = null)
    {
        $result = $this->responseData['output']['result'];
        if($key) {
            if(!is_array($result)) {
                throw new InvalidArgumentException("You cannot specify a key when the result is not an array");
            }
            return $result[$key];
        }
        return $result;
    }

    /**
     * Get error code
     *
     * @return int|bool
     */
    public function getErrorCode()
    {
        if($this->isSuccess()) {
            return false;
        }
        return (int) $this->responseData['output']['error']['ErrorCode'];
    }

    /**
     * Get error message
     *
     * @return string|bool
     */
    public function getErrorMessage()
    {
        if($this->isSuccess()) {
            return false;
        }
        return $this->responseData['output']['error']['ErrorMessage'];
    }

    /**
     * Get original response
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}