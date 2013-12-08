<?php

class RomanNumeralSystem
{
    public function convert($number)
    {
        $symbols = [
            10 => 'X',
            5 => 'V',
            1 => 'I',
        ];
        $representation = '';
        $numberToDecrease = $number;
        foreach ($symbols as $containedAmount => $symbol) {
            while ($numberToDecrease >= $containedAmount) {
                $representation .= $symbol;
                $numberToDecrease -= $containedAmount;
            }
        }
        $representation = '';
        while ($number >= 10) {
            $representation .= $symbols[10];
            $number -= 10;
        }
        if ($number >= 5) {
            $representation = $symbols[5];
            $number -= 5;
        }
        $representation .= str_repeat($symbols[1], $number);
        return $representation;
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
        $this->assertEquals('XI', $this->system->convert(11));
    }

    public function testThe10SymbolCanBeRepeatedToComposeLargerNumbers()
    {
        $this->assertEquals('XX', $this->system->convert(20));
    }
}
