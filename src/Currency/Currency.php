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

    /**
     * @param CartReturn $cartReturn
     * @return string
     */
    public function getFormattedCurrency(CartReturn $cartReturn): string
    {
        $discountString = $this->getDiscountString($cartReturn->discountItems);
        return  sprintf(
            'Subtotal: %s <br/> Taxes: %s <br/> %s Total: %s',
            $this->formatCurrency($cartReturn->subTotalPrice),
            $this->formatCurrency($cartReturn->totalTaxes),
            $discountString,
            $this->formatCurrency(($cartReturn->subTotalPrice - $cartReturn->totalDiscount + $cartReturn->totalTaxes))
        );
    }

    private function getDiscountString(array $discountItems)
    {
        $sentence = '';
        $spaces = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        foreach ($discountItems as $item) {
            $sentence.= sprintf($spaces."%d%% off %s: -%s<br/>",
                $item->discountPercentage, $item->itemName, $this->formatCurrency($item->discountValue)
            );
        }
        if (count($discountItems)) {
            $sentence = 'Discounts: <br/>'.$sentence;
        }
        return $sentence;
    }

    public function convertPrices(CartReturn $cartReturn): CartReturn
    {
        $cartReturn->totalTaxes = $cartReturn->totalTaxes * $this->getCurrencyExchangeRate();
        $cartReturn->totalDiscount = $cartReturn->totalDiscount * $this->getCurrencyExchangeRate();
        $cartReturn->subTotalPrice  = $cartReturn->subTotalPrice * $this->getCurrencyExchangeRate();
        return $cartReturn;
    }
}
