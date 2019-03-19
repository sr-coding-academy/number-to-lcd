<?php

namespace NumberToLCD;

class NumberToLCD
{
    private $inputNumbers;
    private $allDigits;
    private $display;

    public function __construct($inputNumber)
    {
        $this->inputNumbers = str_split($inputNumber);
        $this->allDigits = $this->initializeAllDigits();
        $this->display = new Display($this->allDigits);
        $this->display->displayAllDigits();
    }

    private function initializeAllDigits()
    {
        $allDigits = [];
        foreach ($this->inputNumbers as $singleDigit) {
            $allDigits[] = new Digit($singleDigit);
        }
        return $allDigits;
    }
}