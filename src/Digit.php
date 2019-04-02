<?php

namespace NumberToLCD;

class Digit
{
    const DIGIT_TEMPLATE_FILE_PATH = __DIR__ . '\..\resources\digits.txt';
    private $singleDigit;
    private $digitTemplate = [];

    public function __construct($singleDigit)
    {
        $this->singleDigit = $singleDigit;
        $this->initializeTemplate();
    }

    private function initializeTemplate()
    {
        $this->digitTemplate = [
            [' ', '_', ' '],
            ['|', '_', '|'],
            ['|', '_', '|']
        ];
    }

    public function readSingleDigitFromFile()
    {
        $line = $this->readFile();

        $line = explode(',', $line);

        return $line;
    }

    public function buildDigit($line)
    {
        $counter=0;
        $tempDigitArray = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($line[$counter] == 0) {
                    $tempDigitArray[$i][$j] = " ";
                }else{
                    $tempDigitArray[$i][$j] = $this->digitTemplate[$i][$j];
                }
                $counter++;
            }
        }
        return $tempDigitArray;
    }

    /**
     * @return bool|resource
     */
    private function readFile()
    {
        $fileHandler = fopen(self::DIGIT_TEMPLATE_FILE_PATH, "r");
        $line = fread($fileHandler, 1024);
        return $line;
    }
}