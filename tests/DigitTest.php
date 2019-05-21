<?php

namespace NumberToLCDTests;

use NumberToLCD\Digit;
use NumberToLCD\Exceptions\LineNotFoundException;
use PHPUnit\Framework\TestCase;

class DigitTest extends TestCase
{
    const ANY_DIGIT = 0;
    const UNIMPLEMENTED_DIGIT = 11;
    /**
     * @var Digit
     */
    private $singleDigit;

    /**
     * @throws LineNotFoundException
     */
    public function setUp()
    {
        $this->singleDigit = new Digit(self::ANY_DIGIT);
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

    /**
     * @throws LineNotFoundException
     */
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

    /**
     * @throws LineNotFoundException
     */
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

    /**
     * @throws LineNotFoundException
     */
    public function testUnimplementedDigitThrowsException()
    {
        $this->expectException(LineNotFoundException::class);
        new Digit(self::UNIMPLEMENTED_DIGIT);
    }
}
