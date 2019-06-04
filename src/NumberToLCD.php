<?php

namespace NumberToLCD;

class NumberToLCD
{
    private $inputNumbers;
    private $allDigits;
    private $display;

    public function __construct(string $inputNumber)
    {
        $this->inputNumbers = str_split($inputNumber);
        $this->inputNumbers = array_map('intval', $this->inputNumbers);
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