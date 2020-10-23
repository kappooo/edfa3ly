<?php


namespace edfa3ly\Challenge\Tax;


class VatTax implements ITax
{
    /**
     * @var float $taxValue;
     */
    private $taxValue = 14;


    /**
     * @return float
     */
    public function getTaxValue() : float
    {
        return $this->taxValue;
    }

}
