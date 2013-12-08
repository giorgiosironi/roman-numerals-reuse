<?php

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->system = new AddictiveAndSubtractiveNumeralSystem(
            $symbols = [
                100 => new Symbol('C'),
                50 => new Symbol('L'),
                10 => new Symbol('X'),
                5 => new Symbol('V'),
                1 => new Symbol('I'),
            ]
        );
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

    public function test50IsConvertedToANewSymbolL()
    {
        $this->assertEquals('L', $this->system->convert(50));
    }

    public function test100IsConvertedToANewSymbolC()
    {
        $this->assertEquals('C', $this->system->convert(100));
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

    public function testASymbolCannotBeRepeatedToBuildALargerExistingSymbolEvenIfOneOfTheRepetitionsIsSubtractedFrom()
    {
        $this->assertNotEquals('VIV', $this->system->convert(9));
        $this->assertEquals('IX', $this->system->convert(9));
    }

    // TODO: implementation details are leaking here
    public function testSubtractiveRepresentationsAreRemovedFromTheNumberWhileItIsConverted()
    {
        $this->assertEquals('XLI', $this->system->convert(41));
    }

    public function testASymbolCannotBeSubtractedFromAVeryDistantSymbol()
    {
        $this->assertNotEquals('IL', $this->system->convert(49));
        $this->assertEquals('XLIX', $this->system->convert(49));
    }

    public function testASymbolCannotBeSubtractedFromAVeryDistantSymbol_2()
    {
        $this->assertNotEquals('IC', $this->system->convert(99));
        $this->assertEquals('XCIX', $this->system->convert(99));
    }
}
