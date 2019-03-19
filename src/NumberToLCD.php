<?php

namespace NumberToLCD;

class NumberToLCD
{
    private $numbers;
    private $allDigits;
    private $display;

    public function __construct($inputNumber)
    {
        $this->numbers = str_split($inputNumber);
        $this->allDigits = [];
        $this->initializeAllDigits();
        $this->display = new Display($this->allDigits);
        $this->display->displayAllDigits();
    }

    private function initializeAllDigits()
    {
        foreach ($this->numbers as $singleDigit) {
            $this->allDigits[] = new Digit($singleDigit);
        }
    }
}