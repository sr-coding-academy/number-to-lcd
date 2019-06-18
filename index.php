<?php

require "vendor/autoload.php";

use NumberToLCD\Display;
use NumberToLCD\InputParser;
use NumberToLCD\NumberToLCD;

$input = "0123456789";
$inputParser = new InputParser();
$display = new Display();

$converter = new NumberToLCD($input, $inputParser, $display);