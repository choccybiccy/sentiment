<?php

namespace Choccybiccy\Sentiment;

/**
 * Class FactoryTest
 * @package Choccybiccy\Sentiment
 */
class FactoryTest extends TestCase
{

    /**
     * Test the create
     */
    public function testCreate()
    {

        $factory = new Factory;
        $endpoint = $factory->create(Factory::ENDPOINT_ANALYSIS_SENTIMENT, "apikey");
        $this->assertInstanceOf("Choccybiccy\\Sentiment\\AbstractSentiment", $endpoint);

    }

    /**
     * Test factory create throws exception when endpoint doesn't exist
     */
    public function testCreateThrowsException()
    {

        $factory = new Factory;
        $this->setExpectedException("Choccybiccy\\Sentiment\\Exception\\NonexistentEndpointException");
        $factory->create("EndpointDoesntExist", "apikey");

    }
}
