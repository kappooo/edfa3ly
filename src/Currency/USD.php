<?php


namespace edfa3ly\Challenge\Currency;


use edfa3ly\Challenge\Prototype\CartReturn;

class USD extends Currency
{

    /**
     * @return string
     */
    public function getCurrencySymbol() : string
    {
        return '$';
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatCurrency(float $number) : string
    {
        return $this->getCurrencySymbol() . round($number, 4);
    }


}
