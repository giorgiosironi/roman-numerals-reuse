<?php

class SubtractiveRuleTest extends PHPUnit_Framework_TestCase
{
    public function testSubtractsASymbolFromTheLastOne()
    {
        $rule = new SubtractiveRule(3);
        $this->assertEquals(
            ['IV'],
            $rule->representationFor([], 4, 'I', 'V', null)
        );
    }

    public function testSubtractsASymbolFromTheSecondLastOne()
    {
        $rule = new SubtractiveRule(3);
        $this->assertEquals(
            ['IX'],
            $rule->representationFor(['V'], 4, 'I', 'V', 'X')
        );
    }

    public function testDoesNotProduceARepresentationIfSubtractiveRepresentationIsNotNeeded()
    {
        $rule = new SubtractiveRule(3);
        $this->assertEquals(
            ['V'],
            $rule->representationFor(['V'], 2, null, null, null)
        );
    }

    public function testSubtractsASymbolFromAVeryFarOneIfItIsAskedTo()
    {
        $rule = new SubtractiveRule(3);
        // wrong according to known Roman rules
        // but this object may support different numeral systems
        $this->assertEquals(
            ['IL'],
            $rule->representationFor(['XL', 'V'], 4, 'I', 'V', 'X', 'L')
        );
    }

    public function testSubtractsASymbolMultipleTimesFromAnotherOne()
    {
        $rule = new SubtractiveRule(2);
        $this->assertEquals(
            ['IIV'],
            $rule->representationFor([], 3, 'I', 'V', null)
        );
    }
}
