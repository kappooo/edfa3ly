<?php


namespace edfa3ly\Challenge\Currency;


class CurrencyFactory
{
    const CURRENCIES = [

        'EGP' => EGP::class,
        'USD' => USD::class,
    ];


    public static function getCurrency(string  $currency) : Currency
    {
        $class = self::CURRENCIES[strtoupper($currency)];
        return new $class();
    }

}
