<?

class SubtractiveRule
{
    public function subtractiveRepresentation($representation, $repetitions, $symbol, $lastSymbol, $nextToLastSymbol)
    {
        if ($repetitions > 3) {

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
