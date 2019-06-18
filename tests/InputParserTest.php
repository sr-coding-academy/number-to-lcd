<?php

namespace NumberToLCDTests;

use NumberToLCD\Digit;
use NumberToLCD\InputParser;
use PHPUnit\Framework\TestCase;



class InputParserTest extends TestCase
{
    const INPUT_NUMBER_AS_STRING = "09";

    /**
     * @throws \NumberToLCD\Exceptions\LineNotFoundException
     */
    public function testShouldReturnArrayOfDigits()
    {
        $inputParser = new InputParser();
        $expected = [
            new Digit(0),
            new Digit(9)
        ];

        $parsedDigits = $inputParser->getDigitsFromNumber(self::INPUT_NUMBER_AS_STRING);

        $this->assertEquals($expected, $parsedDigits);
    }
}
