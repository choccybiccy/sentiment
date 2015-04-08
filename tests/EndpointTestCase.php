<?php

namespace Choccybiccy\Sentiment;

/**
 * Class EndpointTestCase
 * @package Choccybiccy\Sentiment
 */
class EndpointTestCase extends TestCase
{

    /**
     * @var string
     */
    protected $method;

    /**
     * Test endpoint
     */
    public function testEndpoint()
    {

        $endpoint = $this->getMockSelf(array("request"));
        $endpoint->expects($this->once())
            ->method("request");

        $value = md5(mt_rand(0, 1000));

        $endpoint->{$this->method}($value);

        $this->assertArrayHasKey("text", $endpoint->getData());

    }
}
