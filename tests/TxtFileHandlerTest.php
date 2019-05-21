<?php

namespace NumberToLCDTests;

use NumberToLCD\TxtFileHandler;
use PHPUnit\Framework\TestCase;

class TxtFileHandlerTest extends TestCase
{
    public function testDigitsTextFileExists()
    {
        $this->assertFileExists(TxtFileHandler::DIGIT_TEMPLATE_FILE_PATH);
    }

    public function testDigitsTextFileIsReadable()
    {
        $this->assertFileIsReadable(TxtFileHandler::DIGIT_TEMPLATE_FILE_PATH);
    }
}
