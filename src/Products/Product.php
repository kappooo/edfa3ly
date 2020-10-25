<?php

namespace edfa3ly\Challenge\Products;

use edfa3ly\Challenge\Tax\ITax;

class Product
{

    /**
     * @var float $priceInUsd
     */
    protected  $priceInUsd;


    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var float $discountPercentage
     */
    protected $discountPercentage = 0.0;

    /**
     * @return float
     */
    public function getPriceInUsd() : float
    {
        return $this->priceInUsd;
    }

    /**
     * @param float $discountValue
     */
    public function setDiscountPercentageValue(float $discountValue) : void
    {
        $this->discountPercentage = $discountValue;
    }

    /**
     * @return float
     */
    public function getDiscountPercentageValue() : float
    {
        return $this->discountPercentage;
    }


    /**
     * @return float
     */
    public function getPriceAfterDiscount(): float
    {
        if (!empty($this->getDiscountPercentageValue())) {
            return ($this->getPriceInUsd() - ($this->getPriceInUsd() * ($this->getDiscountPercentageValue() / 100)));
        }
        return $this->getPriceInUsd();
    }

    /**
     * @return float
     */
    public function getDiscountValue() : float
    {
       return  ($this->getPriceInUsd() - $this->getPriceAfterDiscount());
    }

    /**
     * @param ITax $tax
     * @return float
     */
    public function getPriceAfterTax(ITax $tax) : float
    {
        return ($this->getPriceInUsd() + ($this->getPriceInUsd() * ($tax->getTaxValue() / 100)));
    }

    /**
     * @param ITax $tax
     * @return float
     */
    public function getTaxValue(ITax $tax) : float
    {
        return ($this->getPriceAfterTax($tax) - $this->getPriceInUsd());
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return  $this->name;
    }

}
