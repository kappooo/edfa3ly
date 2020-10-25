<?php


namespace edfa3ly\Challenge\Output;


use edfa3ly\Challenge\Currency\ICurrency;
use edfa3ly\Challenge\CurrencyHandler;
use edfa3ly\Challenge\Prototype\DiscountItem;

class CommandLineOutput implements IOutput
{

    /**
     * @var CurrencyHandler $currencyHandler
     */
    private CurrencyHandler $currencyHandler;


    /**
     * CommandLineOutput constructor.
     * @param CurrencyHandler $currencyHandler
     */
    public function __construct(CurrencyHandler $currencyHandler)
    {
        $this->currencyHandler = $currencyHandler;
    }

    /**
     * @return string
     */
    public function getOutputSentence(): string
    {
        $cartReturn = $this->currencyHandler->convertCurrencyExchange();
        $currency = $this->currencyHandler->getCurrency();
        $discountString = $this->getDiscountString($cartReturn->getDiscountItems(), $currency);
        return  sprintf(
            "Subtotal: %s \r\nTaxes: %s \r\n%sTotal: %s",
            $currency->formatCurrency($cartReturn->getSubTotalPrice()),
            $currency->formatCurrency($cartReturn->getTotalTaxes()),
            $discountString,
            $currency->formatCurrency($cartReturn->getTotalPrice())
        );
    }


    /**
     * @param array<DiscountItem> $discountItems
     * @param ICurrency $currency
     * @return string
     */
    private function getDiscountString(array $discountItems, ICurrency $currency) : string
    {
        $sentence = "";
        $spaces = "\t";
        foreach ($discountItems as $item) {
            $sentence.= sprintf($spaces."%d%% off %s: -%s\r\n",
                $item->getDiscountPercentage(), $item->getItemName(), $currency->formatCurrency($item->getDiscountValue())
            );
        }
        if (count($discountItems)) {
            $sentence = "Discounts: \r\n".$sentence;
        }
        return $sentence;
    }
}
