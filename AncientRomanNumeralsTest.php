<?php

class AncientRomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->system = new AdditiveAndSubtractiveNumeralSystem(
            [
                5 => new Symbol('V'),
                1 => new Symbol('I'),
            ],
            [
                new AdditiveRule(4)
            ]
        );
    }

    public function testSymbolsCanBeRepeatesMoreThan3Times()
    {
        $this->assertEquals('IIII', $this->system->convert(4));
    }

    // testSymbolsCannotBeRepeatedIfThereAreLargerSymbolsThatCoverTheSameAmount
}
