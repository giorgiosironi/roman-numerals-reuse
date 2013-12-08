<?php

class AdditiveAndSubtractiveNumeralSystem
{
    public function __construct($symbols, array $rules)
    {
        $this->symbols = $symbols;
        $this->rules = $rules;
        $this->subtractiveRule = new SubtractiveRule;
        $this->additiveRule = new AdditiveRule;
    }

    public function convert($number)
    {
        // TODO: extract Representation object
        $representation = [];
        $lastSymbol = null;
        $nextToLastSymbol = null;
        foreach ($this->symbols as $containedAmount => $symbol) {
            $repetitions = floor($number / $containedAmount);
            foreach ($this->rules as $rule) {
                $representation = $rule->representationFor($representation, $repetitions, $symbol, $lastSymbol, $nextToLastSymbol);
            }
                /*
                $representation = $this->subtractiveRule->representationFor($representation, $repetitions, $symbol, $lastSymbol, $nextToLastSymbol);
                $representation = $this->additiveRule->representationFor($representation, $repetitions, $symbol); 
                 */
            $number -= $containedAmount * $repetitions;
            $nextToLastSymbol = $lastSymbol;
            $lastSymbol = $symbol;
        }
        return implode('', $representation);
    }
}
