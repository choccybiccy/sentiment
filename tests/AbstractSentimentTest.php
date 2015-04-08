<?php

namespace Choccybiccy\Sentiment;

/**
 * Class AbstractSentimentTest
 * @package Choccybiccy\Sentiment
 */
class AbstractSentimentTest extends TestCase
{

    /**
     * Test get/set/add data
     */
    public function testGetSetAddData()
    {

        $sentiment = $this->getMockSelf(array(), true);

        $data = array(
            "example" => md5(mt_rand(0, 1000)),
            "api_key" => md5(time()),
        );
        $sentiment->setData($data);
        $this->assertEquals($data, $sentiment->getData());

        $another = md5(mt_rand(1000, 2000));
        $data['another'] = $another;

        $sentiment->addData("another", $another);
        $this->assertArrayHasKey("another", $sentiment->getData());
        $this->assertEquals($data, $sentiment->getData());

    }

    /**
     * Test build URL
     */
    public function testBuildUrl()
    {

        $apiUrl = "http://exampleapi.com/";
        $apiVersion = "1.0";
        $endpoint = "ExampleEndpoint";

        $sentiment = $this->getMockSelf(array(), true);
        $this->setProtectedProperty($sentiment, "apiUrl", $apiUrl);
        $this->setProtectedProperty($sentiment, "apiVersion", $apiVersion);
        $this->setProtectedProperty($sentiment, "endpoint", $endpoint);

        $expected = $apiUrl . $apiVersion . "/" . $endpoint . ".json";
        $this->assertEquals($expected, $this->runProtectedMethod($sentiment, "buildUrl"));

    }

    /**
     * Test request
     */
    public function testRequest()
    {

        $sentiment = $this->getMockSelf(array(), true);
        $this->setProtectedProperty($sentiment, "endpoint", "TestEndpoint");

        $data = array(
            "example" => md5(mt_rand(0, 1000)),
            "api_key" => md5(time()),
        );

        $response = $this->getMockBuilder("GuzzleHttp\\Message\\ResponseInterface")
            ->disableOriginalConstructor()
            ->setMethods(array("json"))
            ->getMockForAbstractClass();

        $httpClient = $this->getMockBuilder("GuzzleHttp\\ClientInterface")
            ->disableOriginalConstructor()
            ->setMethods(array("post"))
            ->getMockForAbstractClass();

        $httpClient->expects($this->once())
            ->method("post")
            ->with($this->runProtectedMethod($sentiment, "buildUrl"), array("body" => $data))
            ->willReturn($response);

        $this->setProtectedProperty($sentiment, "httpClient", $httpClient);

        $sentiment->request($data);

    }
}
