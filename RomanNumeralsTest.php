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
        foreach ($symbols as $containedAmount => $symbol) {
            $repetitions = floor($number / $containedAmount);
            if ($repetitions > 3) {
                return 'I' . $lastSymbol;
            } else {
                $representation .= str_repeat($symbol, $repetitions);
                $number -= $containedAmount * $repetitions;
            }
            $lastSymbol = $symbol;
        }
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
    public function testASymbolCanBeSubtractedFromASymbolDistant2InTheScale()
    {
        $this->markTestIncomplete();
        $this->assertEquals('IX', $this->system->convert(9));
    }
}
