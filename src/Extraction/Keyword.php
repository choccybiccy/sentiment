<?php

namespace Choccybiccy\Sentiment\Extraction;

/**
 * Class Keyword
 * @package Choccybiccy\Sentiment\Extraction
 */
class Keyword extends AbstractExtraction
{

    /**
     * @var string
     */
    protected $endpoint = "KeywordExtraction";

    /**
     * Set the amount of keyword combinations to return
     *
     * @param int $combinations
     * @return $this
     */
    public function setKeywordCombinations($combinations)
    {
        $this->addData("n", $combinations);
        return $this;
    }
}