<?php

class RomanNumericalSystem
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
        $numericalSystem = new RomanNumericalSystem();
        $this->assertEquals('I', $numericalSystem->convert(1));
    }
}
