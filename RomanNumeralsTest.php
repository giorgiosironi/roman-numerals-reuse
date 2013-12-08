<?php

class RomanNumeralSystem
{
    public function convert()
    {
        return 'I';
    }
}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    public function testOneIsConvertedToASingleI()
    {
        $numericalSystem = new RomanNumeralSystem();
        $this->assertEquals('I', $numericalSystem->convert(1));
    }
}
