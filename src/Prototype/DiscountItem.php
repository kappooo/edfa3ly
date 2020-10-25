<?php


namespace edfa3ly\Challenge\Prototype;


use edfa3ly\Challenge\Exceptions\NotFoundPropertyException;

class DiscountItem
{
    /**
     * @var float $discountPercentage
     */
    private float $discountPercentage;

    /**
     * @var string $itemName
     */
    private string $itemName;


    /**
     * @var float $discountValue
     */
    private float $discountValue;

    /**
     * DiscountItem constructor.
     * @param float $discountPercentage
     * @param string $itemName
     * @param float $discountValue
     */
    public function __construct(float $discountPercentage, string $itemName, float $discountValue)
    {
        $this->discountPercentage = $discountPercentage;
        $this->itemName = $itemName;
        $this->discountValue = $discountValue;
    }

    /**
     * @return float
     */
    public function getDiscountPercentage() : float
    {
        return $this->discountPercentage;
    }

    /**
     * @return string
     */
    public function getItemName() : string
    {
        return $this->itemName;
    }

    /**
     * @return float
     */
    public function getDiscountValue() : float
    {
        return $this->discountValue;
    }
}
