<?php

namespace NumberToLCD;

class InputParser
{
    /**
     * @param string $inputNumber
     * @return array
     * @throws Exceptions\LineNotFoundException
     */
    public function getDigitsFromNumber(string $inputNumber)
    {
        $allDigits = [];
        $numbers = $this->parseInputString($inputNumber);
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