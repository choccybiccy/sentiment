<?php

namespace Choccybiccy\Sentiment\Analysis;

use Choccybiccy\Sentiment\AbstractSentiment;

/**
 * Class Subjectivity
 * @package Choccybiccy\Sentiment\Analysis
 */
class Subjectivity extends AbstractSentiment implements AnalysisInterface
{

    const SUBJECTIVITY_OBJECTIVE = "objective";
    const SUBJECTIVITY_SUBJECTIVE = "subjective";

    /**
     * @var string
     */
    protected $endpoint = "SubjectivityAnalysis";

    /**
     * Analyse the subjectivity of a string
     *
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function analyse($string)
    {
        $this->addData("text", $string);
        return $this->request();
    }
}
