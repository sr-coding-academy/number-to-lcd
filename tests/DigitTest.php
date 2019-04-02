<?php

namespace NumberToLCDTests;

use NumberToLCD\Digit;
use PHPUnit\Framework\TestCase;

class DigitTest extends TestCase
{
    const ANY_DIGIT = 5;
    /**
     * @var Digit
     */
    private $singleDigit;

    public function setUp()
    {
        $this->singleDigit = new Digit(self::ANY_DIGIT);
    }

    public function testDigitsTextFileExists()
    {
        $this->assertFileExists(Digit::DIGIT_TEMPLATE_FILE_PATH);
    }

    public function testDigitsTextFileIsReadable()
    {
        $this->assertFileIsReadable(Digit::DIGIT_TEMPLATE_FILE_PATH);
    }

    public function testReadSingleDigitFromFileReturnValidArray()
    {
        $this->assertIsArray($this->singleDigit->readSingleDigitFromFile());
    }

    public function testReadSingleDigitFromFileHasRightSize()
    {
        $expectedArraySize = 9;
        $actualArraySize = sizeof($this->singleDigit->readSingleDigitFromFile());

        $this->assertEquals($expectedArraySize, $actualArraySize);
    }

    public function testDigitArrayContainsOnlyNumericCharacters()
    {
        $listOfCharacters = $this->singleDigit->readSingleDigitFromFile();
        foreach ($listOfCharacters as $char){
            $this->assertIsNumeric($char);
        }
    }
}
