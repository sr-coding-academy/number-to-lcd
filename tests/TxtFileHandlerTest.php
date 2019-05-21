<?php

namespace NumberToLCDTests;

use NumberToLCD\Exceptions\LineNotFoundException;
use NumberToLCD\TxtFileHandler;
use PHPUnit\Framework\TestCase;

class TxtFileHandlerTest extends TestCase
{
    const UNIMPLEMENTED_DIGIT = 11;
    /**
     * @var TxtFileHandler
     */
    private $txtFileHandler;

    public function setUp()
    {
        $this->txtFileHandler = new TxtFileHandler('digits.txt');
    }

    /**
     * @throws LineNotFoundException
     */
    public function testUnimplementedDigitThrowsException()
    {
        $this->expectException(LineNotFoundException::class);
        $this->txtFileHandler->readLineFromFile(self::UNIMPLEMENTED_DIGIT);
    }

    public function testDigitsTextFileExists()
    {
        $this->assertFileExists(TxtFileHandler::DIGIT_TEMPLATE_DIRECTORY . "digits.txt");
    }

    public function testDigitsTextFileIsReadable()
    {
        $this->assertFileIsReadable(TxtFileHandler::DIGIT_TEMPLATE_DIRECTORY . "digits.txt");
    }
}
