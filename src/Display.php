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
        $combinedDigits = [];
        for ($layer = 0; $layer < 3; $layer++) {
            $combinedDigits[$layer] = $this->extractLayerFromDigits($layer);
        }
        $this->printLcd($combinedDigits);
    }

    private function printLcd(array $combinedDigits)
    {
        echo implode("\n", $combinedDigits);
    }

    private function extractLayerFromDigits(int $layer)
    {
        $line = "";
        foreach ($this->allDigits as $digit) {
            $generatedLCD = $digit->getGeneratedLcd();
            $line .= implode('', $generatedLCD[$layer]) . ' ';
        }
        return $line;
    }

}