<?php

namespace NumberToLCD;


class Display
{
    /**
     * @var $allDigits Digit[]
     */
    private $allDigits;

    public function displayAllDigits($allDigits)
    {
        $this->allDigits = $allDigits;
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