<?php


namespace edfa3ly\Challenge\Prototype;

use edfa3ly\Challenge\Exceptions\NotFoundPropertyException;

class CartReturn
{
    private $totalTaxes;

    private $totalDiscount;

    private $subTotalPrice;

    private $discountItems;


    /**
     * CartReturn constructor.
     * @param float $totalTaxes
     * @param float $totalDiscount
     * @param array $discountItems
     * @param float $subTotalPrice
     */
    public function __construct(float $totalTaxes, float $totalDiscount, array $discountItems, float $subTotalPrice)
    {
        $this->totalTaxes = $totalTaxes;
        $this->totalDiscount = $totalDiscount;
        $this->discountItems = $discountItems;
        $this->subTotalPrice = $subTotalPrice;
    }

    /**
     * @param $name
     * @param $value
     * @throws NotFoundPropertyException
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new NotFoundPropertyException();
        }
    }

    /**
     * @param $name
     * @return mixed
     * @throws NotFoundPropertyException
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new NotFoundPropertyException();
    }

}
