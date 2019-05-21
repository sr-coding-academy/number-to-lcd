<?php

namespace NumberToLCD;


class Display
{
    private $allDigits;

    /**
     * @param Digit[] $allDigits
     */
    public function __construct($allDigits)
    {
        var_dump($allDigits);
        $this->allDigits = $allDigits;
    }

    public function displayAllDigits()
    {
        foreach ($this->allDigits as $digit) {
            // TODO
        }
    }

}