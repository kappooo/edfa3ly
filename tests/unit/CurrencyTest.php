<?php


namespace edfa3ly\Challenge\tests\unit;

use edfa3ly\Challenge\Currency\CurrencyFactory;
use edfa3ly\Challenge\Currency\EGP;
use edfa3ly\Challenge\Currency\USD;
use edfa3ly\Challenge\Prototype\CartReturn;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{

    public function test_currency_facory()
    {
        $this->assertInstanceOf(EGP::class, CurrencyFactory::getCurrency('EGP'));

        $this->assertInstanceOf(USD::class, CurrencyFactory::getCurrency('USD'));
    }


    public function test_get_right_symbol()
    {
        $currency = new EGP();
        $this->assertEquals('e£', $currency->getCurrencySymbol());

        $currency = new USD();
        $this->assertEquals('$', $currency->getCurrencySymbol());
    }

    public function test_format_price_within_currency()
    {

        $currency = new EGP();
        $this->assertEquals('100 e£', $currency->formatCurrency(100));

        $currency = new USD();
        $this->assertEquals('$100', $currency->formatCurrency(100));
    }

    public function test_get_exchange_rate_per_currency()
    {

        $currency = new EGP();
        $this->assertEquals(15.7428, $currency->getCurrencyExchangeRate());

    }


    public function test_convert_price_due_to_local_price()
    {
        $cartReturn = new CartReturn(10, 15, [], 50);
        $currency = new EGP();
        $newCartReturn = $currency->convertPrices($cartReturn);
        $this->assertEquals($newCartReturn->getTotalTaxes(), 157.428);
        $this->assertEquals($newCartReturn->getTotalDiscount(), 236.142);
        $this->assertEquals($newCartReturn->getSubTotalPrice(), 787.14);
    }

}
