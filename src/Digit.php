<?php

namespace NumberToLCD;

class Digit
{
    const DIGIT_TEMPLATE_FILE_PATH = __DIR__ . '\..\resources\digits.txt';
    private $singleDigit;
    private $singleInputLine;
    private $digitTemplate = [];

    public function __construct($singleDigit)
    {
        $this->singleDigit = $singleDigit;
        $this->singleInputLine = $this->readSingleDigitFromFile();
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

    public function buildDigit()
    {
        $inputLinePosition = 0;
        $tempDigitArray = [];
        for ($row = 0; $row < 3; $row++) {
            for ($column = 0; $column < 3; $column++) {
                $tempDigitArray[$row][$column] = $this->getCharacterOfTemplatePosition($inputLinePosition, $this->digitTemplate[$row][$column]);
                $inputLinePosition++;
            }
        }
        return $tempDigitArray;
    }

    public function readSingleDigitFromFile()
    {
        $line = $this->readFile();
        $line = explode(',', $line);

        return $line;
    }

    /**
     * @return bool|resource
     */
    private function readFile()
    {
        $fileHandler = fopen(self::DIGIT_TEMPLATE_FILE_PATH, "r");
        $counter = 0;

        if ($fileHandler) {
            while(!feof($fileHandler)) {
                $line = fgets($fileHandler);
                if($counter === $this->singleDigit) {
                    fclose($fileHandler);
                    return rtrim($line);
                }
                $counter++;
            }
        }
        return null;
    }

    /**
     * @param int $inputLinePosition
     * @param string $templateCharacter
     * @return string
     */
    private function getCharacterOfTemplatePosition(int $inputLinePosition, string $templateCharacter): string
    {
        if ($this->singleInputLine[$inputLinePosition] == 0) {
            return " ";
        }
        return $templateCharacter;
    }
}