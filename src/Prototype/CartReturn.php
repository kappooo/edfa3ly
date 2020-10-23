<?php


namespace edfa3ly\Challenge\Prototype;

use edfa3ly\Challenge\Exceptions\NotFoundPropertyException;

class CartReturn
{
    private $totalTaxes;

    private $totalDiscount;

    private $subTotalPrice;

    private $discountItems;

    public function __construct(float $totalTaxes, float $totalDiscount, array $discountItems, float $subTotalPrice)
    {
        $this->totalTaxes = $totalTaxes;
        $this->totalDiscount = $totalDiscount;
        $this->discountItems = $discountItems;
        $this->subTotalPrice = $subTotalPrice;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new NotFoundPropertyException();
        }
    }


    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new NotFoundPropertyException();
    }

}
