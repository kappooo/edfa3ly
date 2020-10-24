<?php


namespace edfa3ly\Challenge\Currency;


use edfa3ly\Challenge\Prototype\CartReturn;

abstract class Currency implements ICurrency
{

    /**
     * @var float $currencyExchangeRateFromUsd
     */
    protected $currencyExchangeRateFromUsd = 1.0;

    /**
     * @return string
     */
    public abstract function getCurrencySymbol() : string;

    /**
     * @param float $number
     * @return string
     */
    public abstract function formatCurrency(float $number) : string;


    /**
     * @return float
     */
    public function getCurrencyExchangeRate(): float
    {
        return $this->currencyExchangeRateFromUsd;
    }



    public function convertPrices(CartReturn $cartReturn): CartReturn
    {
        $cartReturn->totalTaxes = $cartReturn->totalTaxes * $this->getCurrencyExchangeRate();
        $cartReturn->totalDiscount = $cartReturn->totalDiscount * $this->getCurrencyExchangeRate();
        $cartReturn->subTotalPrice  = $cartReturn->subTotalPrice * $this->getCurrencyExchangeRate();
        return $cartReturn;
    }
}
