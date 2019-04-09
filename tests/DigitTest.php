<?php

namespace NumberToLCDTests;

use NumberToLCD\Digit;
use PHPUnit\Framework\TestCase;

class DigitTest extends TestCase
{
    const ANY_DIGIT = 0;
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

    /**
     * @throws \ReflectionException
     */
    private function reflectionOnSingleDigitFromFile()
    {
        $reflectionClass = new \ReflectionClass(Digit::class);
        $method = $reflectionClass->getMethod('getSingleDigitFromFile');
        $method->setAccessible(true);
        return $method->invoke($this->singleDigit);
    }

    /**
     * @throws \ReflectionException
     */
    public function testReadSingleDigitFromFileReturnValidArray()
    {
        $this->assertIsArray($this->reflectionOnSingleDigitFromFile());
    }

    /**
     * @throws \ReflectionException
     */
    public function testReadSingleDigitFromFileHasRightSize()
    {
        $expectedArraySize = 9;
        $actualArraySize = sizeof($this->reflectionOnSingleDigitFromFile());

        $this->assertEquals($expectedArraySize, $actualArraySize);
    }

    /**
     * @throws \ReflectionException
     */
    public function testDigitArrayContainsOnlyNumericCharacters()
    {
        $listOfCharacters = $this->reflectionOnSingleDigitFromFile();
        foreach ($listOfCharacters as $char) {
            $this->assertIsNumeric($char);
        }
    }

    public function testBuildZeroReturnsCorrectArray()
    {
        $testDigit = new Digit(0);
        $expected = [
            [" ", "_", " "],
            ["|", " ", "|"],
            ["|", "_", "|"]
        ];
        $this->assertEquals($expected, $testDigit->getGeneratedLcd());
    }

    public function testBuildOneReturnsCorrectArray()
    {
        $testDigit = new Digit(1);
        $expected = [
            [" ", " ", " "],
            [" ", " ", "|"],
            [" ", " ", "|"]
        ];
        $this->assertEquals($expected, $testDigit->getGeneratedLcd());
    }
}
