<?

class AddictiveRule
{
    public function additiveRepresentation($representation, $repetitions, $symbol)
    {
        $representation[] = str_repeat($symbol, $repetitions);
        return $representation;
    }
}
