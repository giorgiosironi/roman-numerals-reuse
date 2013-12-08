<?php

class RomanNumeralSystem
{
    public function convert($number)
    {
        $symbols = [
            1 => 'I',
            5 => 'V',
            10 => 'X',
        ];
        if ($number == 10) {
            return $symbols[10];
        }
        if ($number == 5) {
            return $symbols[5];
        }
        return str_repeat($symbols[1], $number);
    }
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->system = new RomanNumeralSystem();
    }

    public function testOneIsConvertedToASingleI()
    {
        $this->assertEquals('I', $this->system->convert(1));
    }

    public function testTwoIsConvertedToAPairOfI()
    {
        $this->assertEquals('II', $this->system->convert(2));
    }

    public function test5IsConvertedToANewSymbolV()
    {
        $this->assertEquals('V', $this->system->convert(5));
    }

    public function test10IsConvertedToANewSymbolX()
    {
        $this->assertEquals('X', $this->system->convert(10));
    }

    public function testSymbolsCanBeAddedTogetherToComposeNumbers()
    {
        $this->markTestIncomplete();
        $this->assertEquals('XI', $this->system->convert(11));
    }

    public function testThe10SymbolCanBeRepeatedToComposeLargerNumbers()
    {
        $this->markTestIncomplete();
        $this->assertEquals('XX', $this->system->convert(20));
    }
}
