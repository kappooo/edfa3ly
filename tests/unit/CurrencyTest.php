<?php


namespace edfa3ly\Challenge\tests\unit;

use edfa3ly\Challenge\Currency\Currency;
use edfa3ly\Challenge\Currency\EGP;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testGetSymoble()
    {
        $currency = new EGP();
        $this->assertEquals('e£', $currency->getCurrencySymbol());
    }

}
