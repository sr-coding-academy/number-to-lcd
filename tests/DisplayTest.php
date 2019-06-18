<?php
namespace NumberToLCDTests;

use NumberToLCD\Digit;
use NumberToLCD\Display;
use PHPUnit\Framework\TestCase;

class DisplayTest extends TestCase
{
    /** @var Digit */
    private $zeroDigit;
    /** @var Display */
    private $display;

    /**
     * @throws \NumberToLCD\Exceptions\LineNotFoundException
     */
    protected function setUp()
    {
        $this->zeroDigit = new Digit(0);
        $this->display = new Display();
    }

    public function testShouldDisplayZero()
    {
        $expected = " _  \n| | \n|_| ";

        $this->display->displayAllDigits([$this->zeroDigit]);

        /** @noinspection PhpParamsInspection */
        $this->expectOutputString($expected);
    }

    public function testShouldDisplayTwoZeros()
    {
        $expected = " _   _  \n| | | | \n|_| |_| ";

        $this->display->displayAllDigits([$this->zeroDigit, $this->zeroDigit]);

        /** @noinspection PhpParamsInspection */
        $this->expectOutputString($expected);
    }


}
