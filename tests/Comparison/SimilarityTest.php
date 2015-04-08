<?php

namespace Choccybiccy\Sentiment\Comparison;

use Choccybiccy\Sentiment\TestCase;

/**
 * Class SimilarityTest
 * @package Choccybiccy\Sentiment\Comparison
 */
class SimilarityTest extends TestCase
{

    /**
     * Test endpoint
     */
    public function testCompare()
    {
        $similarity = $this->getMockSelf(array("request"));
        $similarity->expects($this->once())
            ->method("request");
        $similarity->compare("stringA", "stringB");
        $this->assertArrayHasKey("original", $similarity->getData());
        $this->assertArrayHasKey("copy", $similarity->getData());
    }
}
