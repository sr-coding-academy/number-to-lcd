<?php

namespace NumberToLCD;

class Digit
{
    private $singleDigit;

    public function __construct($singleDigit)
    {
        $this->singleDigit = $singleDigit;
        $this->readSingleDigitFromFile($this->singleDigit);
    }

    public function getGraphicalOutput()
    {
        $graphicalOutput = [
            [' ', '_', ' '],
            ['|', '_', '|'],
            ['|', '_', '|']
        ];
        $this->displaySingleDigit($graphicalOutput);
    }

    private function displaySingleDigit($display)
    {
        for ($i = 0; $i < 3; $i++) {
            echo $display[$i][0] . $display[$i][1] . $display[$i][2];
            echo "\n";
        }
    }

    private function readSingleDigitFromFile($singleDigit)
    {
        $fileHandler = fopen(__DIR__ . '\..\resources\digits.txt', "r");
        $line = fread($fileHandler, 1024);
        $line = explode(',',$line);

        echo $line . "\n";
    }
}