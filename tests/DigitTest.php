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
}
