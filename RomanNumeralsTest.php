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
    public function testOneIsConvertedToASingleI()
    {
        $numericalSystem = new RomanNumeralSystem();
        $this->assertEquals('I', $numericalSystem->convert(1));
    }

    public function testTwoIsConvertedToAPairOfI()
    {
        $numericalSystem = new RomanNumeralSystem();
        $this->assertEquals('II', $numericalSystem->convert(2));
    }
}
