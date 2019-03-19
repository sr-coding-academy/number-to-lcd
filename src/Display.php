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
        $this->allDigits = $allDigits;
    }

    public function displayAllDigits()
    {
        foreach ($this->allDigits as $digit) {
            $digit->displaySingleDigit();
        }
    }

}