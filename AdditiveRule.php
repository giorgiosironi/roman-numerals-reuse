<?

class AdditiveRule
{
    private $upperRepetitionsLimit;
    
    public function __construct($upperRepetitionsLimit)
    {
        $this->upperRepetitionsLimit = $upperRepetitionsLimit;
    }

    public function representationFor($representation, $repetitions, $symbol)
    {
        if ($repetitions <= $this->upperRepetitionsLimit) {
            $representation[] = str_repeat($symbol, $repetitions);
        }
        return $representation;
    }
}
