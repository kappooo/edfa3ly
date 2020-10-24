<?php


namespace edfa3ly\Challenge\Output;


use edfa3ly\Challenge\Currency\Currency;
use edfa3ly\Challenge\CurrencyHandler;
use edfa3ly\Challenge\Prototype\CartReturn;

class CommandLineOutput implements IOutput
{

    private $currencyHandler;

    public function __construct(CurrencyHandler $currencyHandler)
    {
        $this->currencyHandler = $currencyHandler;
    }

    /**
     * @param CartReturn $cartReturn
     * @param Currency $currency
     * @return string
     */
    public function getOutputSentence(): string
    {
        $cartReturn = $this->currencyHandler->convertCurrencyExchange();
        $currency = $this->currencyHandler->getCurrency();
        $discountString = $this->getDiscountString($cartReturn->discountItems, $currency);
        return  sprintf(
            "Subtotal: %s \r\nTaxes: %s \r\n%sTotal: %s",
            $currency->formatCurrency($cartReturn->subTotalPrice),
            $currency->formatCurrency($cartReturn->totalTaxes),
            $discountString,
            $currency->formatCurrency(($cartReturn->subTotalPrice - $cartReturn->totalDiscount + $cartReturn->totalTaxes))
        );
    }


    /**
     * @param array $discountItems
     * @param Currency $currency
     * @return string
     */
    private function getDiscountString(array $discountItems, Currency $currency) : string
    {
        $sentence = "";
        $spaces = "\t";
        foreach ($discountItems as $item) {
            $sentence.= sprintf($spaces."%d%% off %s: -%s\r\n",
                $item->discountPercentage, $item->itemName, $currency->formatCurrency($item->discountValue)
            );
        }
        if (count($discountItems)) {
            $sentence = "Discounts: \r\n".$sentence;
        }
        return $sentence;
    }
}
