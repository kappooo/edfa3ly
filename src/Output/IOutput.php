<?php


namespace edfa3ly\Challenge\Output;

use edfa3ly\Challenge\CurrencyHandler;

interface IOutput
{
    /**
     * IOutput constructor.
     * @param CurrencyHandler $currencyHandler
     */
    public function __construct(CurrencyHandler $currencyHandler);

    /**
     * @return string
     */
    public function getOutputSentence() : string;
}
