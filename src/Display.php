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
            $generatedLCD = $digit->getGeneratedLcd();
            $this->printLcd($generatedLCD);
        }
    }

    private function printLcd(array $generatedLcd)
    {
        foreach ($generatedLcd as &$line) {
            $line = implode('', $line);
        }
        echo implode("\n", $generatedLcd);
    }

}