<?php

class RomanNumeralSystem
{
    public function convert($number)
    {
        $symbols = [
            10 => new Symbol('X'),
            5 => new Symbol('V'),
            1 => new Symbol('I'),
        ];
        $representation = [];
        foreach ($symbols as $containedAmount => $symbol) {
            $repetitions = floor($number / $containedAmount);
            if ($repetitions > 3) {
                if (end($representation) == $lastSymbol) {
                    array_pop($representation);
                    $representation[] = $symbol . 'X';
                } else {
                    $representation[] = $symbol . $lastSymbol;
                }
            } else {
                $representation[] = str_repeat($symbol, $repetitions);
                $number -= $containedAmount * $repetitions;
            }
            $lastSymbol = $symbol;
        }
        return implode('', $representation);
    }
}

class Symbol
{
    private $representation;

    public function __construct($representation)
    {
        $this->representation = $representation;
    }

    public function __toString()
    {
        return $this->representation;
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

    public function testSymbolsCanBeRepeatedToFormLargerNumbers()
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

    public function testASymbolCannotBeRepeatedMoreThan3TimesAndMustBeSubtractedFromTheNextSymbol()
    {
        $this->assertEquals('IV', $this->system->convert(4));
    }

    // TODO: naming of these 2 tests
    public function testASymbolCannotBeRepeatedToBuildALargerExistingSymbolEvenIfOneOfTheRepetitionsIsSubtractedFrom()
    {
        $this->assertNotEquals('VIV', $this->system->convert(9));
        $this->assertEquals('IX', $this->system->convert(9));
    }
}
