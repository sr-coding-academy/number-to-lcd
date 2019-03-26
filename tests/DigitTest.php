<?php

namespace NumberToLCDTests;

use NumberToLCD\Digit;
use PHPUnit\Framework\TestCase;

class DigitTest extends TestCase
{
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
        $singleDigit = new Digit(5);
        $this->assertIsArray($singleDigit->readSingleDigitFromFile());
    }

    public function testReadSingleDigitFromFileHasRightSize()
    {
        $singleDigit = new Digit(5);
        $expectedArraySize = 9;
        $actualArraySize = sizeof($singleDigit->readSingleDigitFromFile());
        $this->assertEquals($expectedArraySize, $actualArraySize);
    }
}
