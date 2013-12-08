<?php

class Symbol
{
    private $representation;

    public function __construct($representation)
    {
        $this->representation = $representation;
    }

    public function __toString()
    {
        return $this->representation;
    }
}

