<?php

namespace NumberToLCD;

use NumberToLCD\Exceptions\LineNotFoundException;

class Digit
{
    const DIGIT_TEMPLATE_FILE_PATH = __DIR__ . '\..\resources\digits.txt';
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
        $line = $this->readLineFromFile();
        $line = explode(',', $line);

        return $line;
    }

    /**
     * @return resource
     * @throws LineNotFoundException
     */
    private function readLineFromFile()
    {
        $fileHandler = fopen(self::DIGIT_TEMPLATE_FILE_PATH, "r");
        $lineNumber = 0;
        if ($fileHandler) {
            while (!feof($fileHandler)) {
                $line = fgets($fileHandler);
                if ($lineNumber === $this->singleDigit) {
                    fclose($fileHandler);
                    return rtrim($line);
                }
                $lineNumber++;
            }
        }
        throw new LineNotFoundException($this->singleDigit);
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
