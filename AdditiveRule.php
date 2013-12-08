<?

class AdditiveRule
{
    public function representationFor($representation, $repetitions, $symbol)
    {
        if ($repetitions <= 3) {
            $representation[] = str_repeat($symbol, $repetitions);
        }
        return $representation;
    }
}
