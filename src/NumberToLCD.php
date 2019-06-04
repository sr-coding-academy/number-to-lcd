<?php

namespace NumberToLCD;

class NumberToLCD
{
    private $display;

    /**
     * NumberToLCD constructor.
     * @param string $inputNumberAsString
     * @throws Exceptions\LineNotFoundException
     */
    public function __construct(string $inputNumberAsString)
    {
        $allDigits = $this->initializeAllDigits($inputNumberAsString);
        $this->display = new Display($allDigits);
        $this->display->displayAllDigits();
    }

    /**
     * @param string $inputNumberAsString
     * @return array
     * @throws Exceptions\LineNotFoundException
     */
    private function initializeAllDigits(string $inputNumberAsString)
    {
        $allDigits = [];
        $numbers = $this->parseInputString($inputNumberAsString);
        foreach ($numbers as $singleDigit) {
            $allDigits[] = new Digit($singleDigit);
        }

        return $allDigits;
    }

    /**
     * @param string $inputNumber
     * @return array
     */
    private function parseInputString(string $inputNumber): array
    {
        $inputNumbers = str_split($inputNumber);
        return array_map('intval', $inputNumbers);
    }
}