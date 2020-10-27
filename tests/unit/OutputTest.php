<?php

namespace unit;

use edfa3ly\Challenge\CartHandler;
use edfa3ly\Challenge\CurrencyHandler;
use edfa3ly\Challenge\Output\CommandLineOutput;
use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{

    public function test_output_when_have_discount()
    {
        $commandLineOutputObject = new CommandLineOutput(new CurrencyHandler(new CartHandler(['pants','t-shirt', 'shoes']), "EGP"));
        $this->assertTrue(strpos($commandLineOutputObject->getOutputSentence(), 'Discounts') !== false);
        $this->assertTrue(strpos($commandLineOutputObject->getOutputSentence(), 'Taxes: 0') !== false);
    }

    public function test_output_when_not_have_discount()
    {
        $commandLineOutputObject = new CommandLineOutput(new CurrencyHandler(new CartHandler(['pants','t-shirt',]), "EGP"));
        $this->assertTrue(strpos($commandLineOutputObject->getOutputSentence(), 'Discounts') === false);
        $this->assertTrue(strpos($commandLineOutputObject->getOutputSentence(), 'Taxes: 0') !== false);
    }
}
