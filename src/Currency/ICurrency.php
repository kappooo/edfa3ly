<?php


namespace edfa3ly\Challenge\Currency;


use edfa3ly\Challenge\Prototype\CartReturn;

interface ICurrency
{

    /**
     * @return string
     */
    public function getCurrencySymbol() : string;

    /**
     * @return float
     */
    public function getCurrencyExchangeRate(): float;


    /**
     * @param float $number
     * @return string
     */
    public function formatCurrency(float $number) : string;

    /**
     * @param CartReturn $cartReturn
     * @return CartReturn
     */
    public function convertPrices(CartReturn $cartReturn) : CartReturn;

}
