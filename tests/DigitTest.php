<?php

namespace NumberToLCDTests;

use PHPUnit\Framework\TestCase;

class DigitTest extends TestCase
{
    public function testDigitsTextFileExists()
    {
        $fileLocation = __DIR__ . '\..\resources\digits.txt';
        $this->assertFileExists($fileLocation);
    }
}
