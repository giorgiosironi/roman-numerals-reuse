<?

class SubtractiveRule
{
    private $lowerRepetitionsLimit;
    
    public function __construct($lowerRepetitionsLimit)
    {
        $this->lowerRepetitionsLimit = $lowerRepetitionsLimit;
    }

    public function representationFor($representation, $repetitions, $symbol, $lastSymbol, $secondLastSymbol, $thirdLastSymbol = null)
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
                if (end($representation) == $secondLastSymbol . $thirdLastSymbol && $thirdLastSymbol) {
                    array_pop($representation);
                    $representation[] = $symbol . $thirdLastSymbol;
                } else {
                    $representation[] = $symbol . $secondLastSymbol;
                }
            } else {
                $representation[] = $symbol . $lastSymbol;
            }
        } 
        return $representation;
    }
}
