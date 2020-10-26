<?php

namespace edfa3ly\Challenge\Currency;

class EGP extends Currency
{
    protected $currencyExchangeRateFromUsd = 15.7428;

    /**
     * @return string
     */
    public function getCurrencySymbol(): string
    {
        return 'e£';
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatCurrency(float $number) : string
    {
        return round($number, 4) . ' ' .$this->getCurrencySymbol();
    }
}
