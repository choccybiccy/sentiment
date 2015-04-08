<?php

namespace Choccybiccy\Sentiment\Assessment;

/**
 * Interface AssessmentInterface
 * @package Choccybiccy\Sentiment\Assessment
 */
interface AssessmentInterface
{

    /**
     * @param string $string
     * @return \Choccybiccy\Sentiment\Response
     */
    public function assess($string);
}
