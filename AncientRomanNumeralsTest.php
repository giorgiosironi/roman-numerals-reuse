<?php

class AncientRomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->system = new AdditiveAndSubtractiveNumeralSystem(
            $symbols = [
                5 => new Symbol('V'),
                1 => new Symbol('I'),
            ]
        );
    }

    public function testSymbolsCanBeRepeatesMoreThan3Times()
    {
        $this->markTestIncomplete();
        $this->assertEquals('IIII', $this->system->convert(1));
    }

    // testSymbolsCannotBeRepeatedIfThereAreLargerSymbolsThatCoverTheSameAmount
}
