<?php

namespace NumberToLCD;


use NumberToLCD\Exceptions\LineNotFoundException;

class TxtFileHandler
{
    const DIGIT_TEMPLATE_DIRECTORY = __DIR__ . '\..\resources\\';
    private $digitTemplateFileName;

    public function __construct($digitTemplateFileName)
    {
        $this->digitTemplateFileName = $digitTemplateFileName;
    }

    /**
     * @param int $singleDigit
     * @return resource
     * @throws LineNotFoundException
     */
    public function readLineFromFile(int $singleDigit)
    {
        $fileHandler = fopen(self::DIGIT_TEMPLATE_DIRECTORY . $this->digitTemplateFileName, "r");
        $lineNumber = 0;
        if ($fileHandler) {
            while (!feof($fileHandler)) {
                $line = fgets($fileHandler);
                if ($lineNumber === $singleDigit) {
                    fclose($fileHandler);
                    return rtrim($line);
                }
                $lineNumber++;
            }
        }
        throw new LineNotFoundException($singleDigit);
    }
}