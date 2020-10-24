<?php


namespace edfa3ly\Challenge;


use edfa3ly\Challenge\Currency\Currency;
use edfa3ly\Challenge\Currency\ICurrency;
use edfa3ly\Challenge\Output\HtmlOutput;
use edfa3ly\Challenge\Prototype\CartReturn;

class CurrencyHandler
{
    /**
     * @var IHandler $handler
     */
    private $handler;


    /**
     * @var ICurrency $currency
     */
    private $currency;


    public function __construct(IHandler $handler, ICurrency $currency)
    {
        $this->handler = $handler;
        $this->currency = $currency;
    }

    /**
     * @return CartReturn
     */
    public function convertCurrencyExchange() : CartReturn
    {
        return $this->currency->convertPrices($this->handler->handel());
    }

    /**
     * @return Currency
     */
    public function getCurrency() : Currency
    {
        return $this->currency;
    }

}
