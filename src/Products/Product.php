<?php

namespace edfa3ly\Challenge\Products;

class Product
{

    /**
     * @var float $priceInUsd
     */
    protected  $priceInUsd;

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
    public function setDiscountPercentageValue(float $discountValue)
    {
        $this->discountPercentage = $discountValue;
    }


    /**
     * @return float
     */
    public function getPriceAfterDiscount(): float
    {
        if (!empty($this->discountPercentage)) {
            return ($this->getPriceInUsd() - ($this->getPriceInUsd() * ($this->discountPercentage / 100)));
        }
        return $this->getPriceInUsd();
    }

    /**
     * @return float
     */
    public function getDiscountValue(): float
    {
       return  $this->getPriceInUsd() - $this->getPriceAfterDiscount();
    }

}
