<?php

class RomanNumeralSystem
{
    public function convert($number)
    {
        if ($number == 5) {
            return 'V';
        }
        return str_repeat('I', $number);
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
}
