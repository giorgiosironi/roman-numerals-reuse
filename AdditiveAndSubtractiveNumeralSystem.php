<?php

class AdditiveAndSubtractiveNumeralSystem
{
    public function __construct($symbols, array $rules)
    {
        $this->symbols = $symbols;
        $this->rules = $rules;
    }

    public function convert($number)
    {
        // TODO: extract Representation object
        $representation = [];
        // TODO: passing null explicitly to a rule. Not good
        $lastSymbol = null;
        $nextToLastSymbol = null;
        foreach ($this->symbols as $containedAmount => $symbol) {
            $repetitions = floor($number / $containedAmount);
            foreach ($this->rules as $rule) {
                // TODO: unclear and long signature
                $representation = $rule->representationFor($representation, $repetitions, $symbol, $lastSymbol, $nextToLastSymbol);
            }
            $number -= $containedAmount * $repetitions;
            $nextToLastSymbol = $lastSymbol;
            $lastSymbol = $symbol;
        }
        return implode('', $representation);
    }
}
