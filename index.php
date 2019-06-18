<?php

require "vendor/autoload.php";

use NumberToLCD\Display;
use NumberToLCD\InputParser;
use NumberToLCD\NumberToLCD;

$input = "0123456789";
$converter = new NumberToLCD(
    new InputParser(),
    new Display()
);

$converter->printToLCD($input);