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
}
