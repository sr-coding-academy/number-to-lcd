<?php

namespace NumberToLCD;

class NumberToLCD
{
    private $display;
    private $inputParser;

    /**
     * NumberToLCD constructor.
     * @param string $inputNumber
     * @throws Exceptions\LineNotFoundException
     */
    public function __construct(string $inputNumber)
    {
        $this->inputParser = new InputParser();
        $allDigits = $this->inputParser->getDigitsFromNumber($inputNumber);
        $this->display = new Display($allDigits);
        $this->display->displayAllDigits();
    }


}