<?php

namespace NumberToLCD;

use NumberToLCD\Exceptions\FileNotFoundException;
use NumberToLCD\Exceptions\LineNotFoundException;

class Digit
{
    private $singleDigit;
    private $singleInputLine;
    private $generatedLcd;

    /**
     * @param int $singleDigit
     * @throws LineNotFoundException
     */
    public function __construct(int $singleDigit)
    {
        $this->singleDigit = $singleDigit;
        $this->singleInputLine = $this->getSingleDigitFromFile();
        $this->generatedLcd = $this->generateLcd();
    }

    /**
     * @return array|resource
     * @throws LineNotFoundException
     */
    private function getSingleDigitFromFile()
    {
        $line = $this->getLineFromHandler();
        $line = explode(',', $line);

        return $line;
    }

    /**
     * @return string
     * @throws FileNotFoundException
     * @throws LineNotFoundException
     */
    private function getLineFromHandler(): string
    {
        $txtFileHandler = new TxtFileHandler('digits.txt');
        return $txtFileHandler->readLineFromFile($this->singleDigit);
    }

    private function generateLcd()
    {
        $inputLinePosition = 0;
        $tempDigitArray = [];
        $digitTemplate = $this->getTemplate();
        for ($row = 0; $row < 3; $row++) {
            for ($column = 0; $column < 3; $column++) {
                $tempDigitArray[$row][$column] = $this->getCharacterOfTemplatePosition($inputLinePosition, $digitTemplate[$row][$column]);
                $inputLinePosition++;
            }
        }
        return $tempDigitArray;
    }

    private function getCharacterOfTemplatePosition(int $inputLinePosition, string $templateCharacter): string
    {
        if ($this->singleInputLine[$inputLinePosition] == 0) {
            return " ";
        }
        return $templateCharacter;
    }

    private function getTemplate()
    {
        return [
            [' ', '_', ' '],
            ['|', '_', '|'],
            ['|', '_', '|']
        ];
    }

    public function getGeneratedLcd(): array
    {
        return $this->generatedLcd;
    }
}
