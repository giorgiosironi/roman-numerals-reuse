<?

class SubtractiveRule
{
    private $lowerRepetitionsLimit;
    
    public function __construct($lowerRepetitionsLimit)
    {
        $this->lowerRepetitionsLimit = $lowerRepetitionsLimit;
    }

    public function representationFor($representation, $repetitions, $symbol, $lastSymbol, $nextToLastSymbol)
    {
        if ($repetitions >= $this->lowerRepetitionsLimit) {
            if (end($representation) == $lastSymbol) {
                array_pop($representation);
                $representation[] = $symbol . $nextToLastSymbol;
            } else {
                $representation[] = $symbol . $lastSymbol;
            }
        } 
        return $representation;
    }
}
