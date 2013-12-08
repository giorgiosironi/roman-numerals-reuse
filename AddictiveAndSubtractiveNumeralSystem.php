<?php

class AddictiveAndSubtractiveNumeralSystem
{
    public function __construct($symbols)
    {
        $this->symbols = $symbols;
        $this->subtractiveRule = new SubtractiveRule;
        $this->additiveRule = new AddictiveRule;
    }

    public function convert($number)
    {
        // TODO: extract Representation object
        $representation = [];
        $lastSymbol = null;
        foreach ($this->symbols as $containedAmount => $symbol) {
            $repetitions = floor($number / $containedAmount);
            if ($repetitions > 3) {
                $representation = $this->subtractiveRule->subtractiveRepresentation($representation, $repetitions, $symbol, $lastSymbol, $nextToLastSymbol);
            } else {
                $representation = $this->additiveRule->additiveRepresentation($representation, $repetitions, $symbol); 
            }
            $number -= $containedAmount * $repetitions;
            $nextToLastSymbol = $lastSymbol;
            $lastSymbol = $symbol;
        }
        return implode('', $representation);
    }

    private function additiveRepresentation($representation, $repetitions, $symbol)
    {
        $representation[] = str_repeat($symbol, $repetitions);
        return $representation;
    }

    private function subtractiveRepresentation($representation, $repetitions, $symbol, $lastSymbol, $nextToLastSymbol)
    {
        if (end($representation) == $lastSymbol) {
            array_pop($representation);
            $representation[] = $symbol . $nextToLastSymbol;
        } else {
            $representation[] = $symbol . $lastSymbol;
        }
        return $representation;
    }
}
