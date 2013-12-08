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
        if ($repetitions >= $this->lowerRepetitionsLimit) {
            if (end($representation) == $largerSymbols[1]) {
                array_pop($representation);
                if (isset($largerSymbols[3]) && end($representation) == $largerSymbols[2] . $largerSymbols[3]) {
                    array_pop($representation);
                    $representation[] = $symbol . $largerSymbols[3];
                } else {
                    $representation[] = $symbol . $largerSymbols[2];
                }
            } else {
                $representation[] = $symbol . $largerSymbols[1];
            }
        } 
        return $representation;
    }
}
