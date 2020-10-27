<?php


namespace unit;


use edfa3ly\Challenge\CartHandler;
use edfa3ly\Challenge\Currency\EGP;
use edfa3ly\Challenge\CurrencyHandler;
use edfa3ly\Challenge\Prototype\CartReturn;
use edfa3ly\Challenge\Tax\VatTax;
use PHPUnit\Framework\TestCase;

class CurrencyHandleTest extends TestCase
{
    public function test_currency_handler()
    {
        $currencyHandler = new CurrencyHandler(new CartHandler(['pants', 'shoes'], [], []), new EGP());
        $pantsPriceInUsd  = 14.99;
        $pantsPriceInEGP = $pantsPriceInUsd * 15.7428;
        $shoesPriceInUsd = 24.99;
        $shoesPriceInEGP = $shoesPriceInUsd * 15.7428;
        $shoesPriceInEGPAfterDiscount  = $shoesPriceInEGP * 10/100;

        $cartReturnObj = $currencyHandler->convertCurrencyExchange();

        $this->assertInstanceOf( CartReturn::class, $cartReturnObj);

        $this->assertEquals(($pantsPriceInEGP + $shoesPriceInEGP - $shoesPriceInEGPAfterDiscount),
            $cartReturnObj->getTotalPrice()
        );
        $this->assertInstanceOf(EGP::class, $currencyHandler->getCurrency());
    }
}
