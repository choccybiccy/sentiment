<?php

namespace Choccybiccy\Sentiment\Extraction;

use Choccybiccy\Sentiment\TestCase;

/**
 * Class KeywordTest
 * @package Choccybiccy\Sentiment\Extraction
 */
class KeywordTest extends TestCase
{

    /**
     * Test setKeywordCombination
     */
    public function testSetKeywordCombination()
    {

        $keyword = $this->getMockSelf();
        $combinations = rand(1,10);
        $keyword->setKeywordCombinations($combinations);

        $data = $keyword->getData();

        $this->assertEquals($combinations, $data['n']);

    }
}