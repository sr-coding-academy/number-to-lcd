<?php

namespace NumberToLCD;


use NumberToLCD\Exceptions\LineNotFoundException;

class TxtFileHandler
{
    const DIGIT_TEMPLATE_FILE_PATH = __DIR__ . '\..\resources\digits.txt';

    /**
     * @param int $singleDigit
     * @return resource
     * @throws LineNotFoundException
     */
    public function readLineFromFile(int $singleDigit)
    {
        $fileHandler = fopen(self::DIGIT_TEMPLATE_FILE_PATH, "r");
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