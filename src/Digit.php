<?php

namespace NumberToLCD;

class Digit
{
    private $singleDigit;
    private $digitTemplate = [];

    /**
     * @return array
     */
    public function getDigitTemplate()
    {
        return $this->digitTemplate;
    }

    public function __construct($singleDigit)
    {
        $this->initializeTemplate();
        $this->singleDigit = $singleDigit;
        $line = $this->readSingleDigitFromFile($this->singleDigit);
        $this->buildDigit($line);
    }

    public function initializeTemplate()
    {
        $this->digitTemplate = [
            [' ', '_', ' '],
            ['|', '_', '|'],
            ['|', '_', '|']
        ];
    }

    public function displaySingleDigit()
    {
        for ($i = 0; $i < 3; $i++) {
            echo $this->digitTemplate[$i][0] . $this->digitTemplate[$i][1] . $this->digitTemplate[$i][2];
            echo "\n";
        }
    }

    private function readSingleDigitFromFile($singleDigit)
    {
        $fileHandler = fopen(__DIR__ . '\..\resources\digits.txt', "r");
        $line = fread($fileHandler, 1024);
        $line = explode(',', $line);

        return $line;
    }

    private function buildDigit($line)
    {
        $counter=0;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($line[$counter] == 0) {
                    $this->digitTemplate[$i][$j] = " ";
                }
                $counter++;
            }
        }
    }
}