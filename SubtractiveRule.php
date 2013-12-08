<?

class SubtractiveRule
{
    private $lowerRepetitionsLimit;
    
    public function __construct($lowerRepetitionsLimit)
    {
        $this->lowerRepetitionsLimit = $lowerRepetitionsLimit;
    }

    public function representationFor($representation, $repetitions, $symbol/*[, $largerSymbol, $largerSymbol, ...]*/)
    {
        // TODO: complex code, unit test it
        // TODO: seems coupled to pieces of $representation
        $arguments = func_get_args();
        array_shift($arguments);
        array_shift($arguments);
        $largerSymbols = $arguments;
        // $largerSymbols[0] not used
        if ($repetitions < $this->lowerRepetitionsLimit) {
            return $representation;
        }
        $symbol = str_repeat($symbol, 5-$repetitions);
        return $this->foo($representation, $symbol, $largerSymbols, 1);
    }

    private function foo($representation, $symbol, array $largerSymbols, $i)
    {
        $testForPresence = '';
        for ($j = $i; $j < count($largerSymbols); $j++) {
            $testForPresence .= $largerSymbols[$j];
        }

        if (end($representation) == $largerSymbols[$i]
            || end($representation) == $testForPresence) {
            array_pop($representation);
            return $this->foo($representation, $symbol, $largerSymbols, $i + 1);
        } else {
            $representation[] = $symbol . $largerSymbols[$i];
            return $representation;
        }
    }
}
