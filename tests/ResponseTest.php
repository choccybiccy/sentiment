<?php

namespace Choccybiccy\Sentiment;

/**
 * Class ResponseTest
 * @package Choccybiccy\Sentiment
 */
class ResponseTest extends TestCase
{

    /**
     * @var array
     */
    protected $responseData = array(
        "output" => array(
            "status" => 1,
            "result" => array(
                "param1" => "data1",
                "param2" => "data2",
            )
        )
    );

    /**
     * @var Response
     */
    protected $response;

    /**
     * Setup
     */
    public function setUp()
    {
        $response = $this->getMockSelf();
        $this->setProtectedProperty(
            $response,
            "response",
            $this->getMockForAbstractClass("GuzzleHttp\\Message\\ResponseInterface")
        );
        $this->setProtectedProperty(
            $response,
            "responseData",
            $this->responseData
        );
        $this->response = $response;
    }

    /**
     * Test getResult
     */
    public function testGetResult()
    {

        $this->assertEquals($this->responseData['output']['result'], $this->response->getResult());
        $this->assertEquals($this->responseData['output']['result']['param1'], $this->response->getResult("param1"));

        $data = array(
            "output" => array(
                "result" => "test"
            )
        );
        $this->setProtectedProperty($this->response, "responseData", $data);
        $this->setExpectedException("Choccybiccy\\Sentiment\\Exception\\InvalidArgumentException");
        $this->response->getResult("test");

    }

    /**
     * Test getErrorCode and getErrorMessage
     */
    public function testGetError()
    {

        $data = array(
            "output" => array(
                "status" => 0,
                "error" => array(
                    "ErrorCode" => Response::ERROR_ACCOUNT_NOT_ACTIVE,
                    "ErrorMessage" => "Account not active",
                )
            )
        );

        $response = $this->response;
        $this->setProtectedProperty($response, "responseData", $data);

        $this->assertEquals($data['output']['error']['ErrorCode'], $response->getErrorCode());
        $this->assertEquals($data['output']['error']['ErrorMessage'], $response->getErrorMessage());

    }

    /**
     * Test isSuccess
     */
    public function testIsSuccess()
    {
        $response = $this->getMockSelf();
        $this->assertTrue($this->response->isSuccess());
        $this->assertFalse($this->response->getErrorCode());
        $this->assertFalse($this->response->getErrorMessage());
    }

    /**
     * Test get response
     */
    public function testGetResponse()
    {
        $this->assertEquals($this->getProtectedProperty($this->response, "response"), $this->response->getResponse());
    }
}