<?php

namespace NumberToLCD;

class NumberToLCD
{
    private $display;
    private $inputParser;

    /**
     * @param InputParser $inputParser
     * @param Display $display
     */
    public function __construct(InputParser $inputParser, Display $display)
    {
        $this->inputParser = $inputParser;
        $this->display = $display;
    }

    /**
     * @param string $inputNumber
     * @throws Exceptions\LineNotFoundException
     */
    public function printToLCD(string $inputNumber)
    {
        $allDigits = $this->inputParser->getDigitsFromNumber($inputNumber);
        $this->display->displayAllDigits($allDigits);
    }
}