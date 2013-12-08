<?

class AdditiveRule
{
    public function __construct($limit = 3)
    {
        $this->limit = $limit;
    }

    public function representationFor($representation, $repetitions, $symbol)
    {
        if ($repetitions <= $this->limit) {
            $representation[] = str_repeat($symbol, $repetitions);
        }
        return $representation;
    }
}
