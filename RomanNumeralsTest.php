<?php

class RomanNumeralSystem
{
    public function convert($number)
    {
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
}
