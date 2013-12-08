<?php

class AdditiveRuleTest extends PHPUnit_Framework_TestCase
{
    private $notTouchedLimit = 100;
    
    public function testRepeatsASymbolForTheRequiredRepetitions()
    {
        $rule = new AdditiveRule($this->notTouchedLimit);
        $this->assertEquals(
            ['II'],
            $rule->representationFor([], 2, 'I')
        );
    }

    public function testDoesNotAlterTheRepresentationIfTheRepetitionsLimitIsReached()
    {
        $rule = new AdditiveRule(3);
        $this->assertEquals(
            ['V'],
            $rule->representationFor(['V'], 4, 'I')
        );
    }
}
