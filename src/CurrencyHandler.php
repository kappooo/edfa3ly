<?php


namespace edfa3ly\Challenge;


use edfa3ly\Challenge\Currency\ICurrency;

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

    public function getFormattedTextPerCurrency() : string
    {
        $currencyHandel = $this->currency->convertPrices($this->handler->handel());

        return $this->currency->getFormattedCurrency($currencyHandel);
    }

}
