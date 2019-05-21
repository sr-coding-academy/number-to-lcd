<?php

namespace NumberToLCD;

use NumberToLCD\Exceptions\FileNotFoundException;
use NumberToLCD\Exceptions\LineNotFoundException;

class TxtFileHandler
{
    const DIGIT_TEMPLATE_DIRECTORY = __DIR__ . '\..\resources\\';

    private $digitTemplates = [];
    private $digitTemplateFileName;

    /**
     * TxtFileHandler constructor.
     * @param $digitTemplateFileName
     * @throws FileNotFoundException
     */
    public function __construct($digitTemplateFileName)
    {
        $this->digitTemplateFileName = $digitTemplateFileName;
        $this->readContentFromFile();
    }

    /**
     * @throws FileNotFoundException
     */
    private function readContentFromFile()
    {
        $fileHandler = fopen(self::DIGIT_TEMPLATE_DIRECTORY . $this->digitTemplateFileName, "r");
        if ($fileHandler) {
            while (!feof($fileHandler)) {
                $this->digitTemplates[] = rtrim(fgets($fileHandler));
            }
            fclose($fileHandler);
        } else {
            throw new FileNotFoundException();
        }
    }

    /**
     * @param int $singleDigit
     * @return string
     * @throws LineNotFoundException
     */
    public function readLineFromFile(int $singleDigit): string
    {
        if (array_key_exists($singleDigit, $this->digitTemplates)) {
            return $this->digitTemplates[$singleDigit];
        }
        throw new LineNotFoundException($singleDigit);
    }
}