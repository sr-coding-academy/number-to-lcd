<?php /** @noinspection ALL */

namespace NumberToLCDTests;

use NumberToLCD\Digit;
use NumberToLCD\Display;
use PHPUnit\Framework\TestCase;

class DisplayTest extends TestCase
{
    private $zeroDigit;

    /**
     * @throws \NumberToLCD\Exceptions\LineNotFoundException
     */
    protected function setUp()
    {
        $this->zeroDigit = new Digit(0);
    }

    public function testShouldDisplayZero()
    {
        $display = new Display([$this->zeroDigit]);
        $expected = " _  \n| | \n|_| ";

        $display->displayAllDigits();

        $this->expectOutputString($expected);
    }

    public function testShouldDisplayTwoZeros()
    {
        $display = new Display([$this->zeroDigit, $this->zeroDigit]);
        $expected = " _   _  \n| | | | \n|_| |_| ";

        $display->displayAllDigits();

        $this->expectOutputString($expected);
    }


}
