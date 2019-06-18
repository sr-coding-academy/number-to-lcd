<?php

namespace NumberToLCD;

class NumberToLCD
{
    private $display;
    private $inputParser;

    /**
     * NumberToLCD constructor.
     * @param string $inputNumber
     * @param InputParser $inputParser
     * @param Display $display
     * @throws Exceptions\LineNotFoundException
     */
    public function __construct(string $inputNumber, InputParser $inputParser, Display $display)
    {
        $this->inputParser = $inputParser;
        $allDigits = $this->inputParser->getDigitsFromNumber($inputNumber);
        $this->display = $display;
        $this->display->displayAllDigits($allDigits);
    }
}