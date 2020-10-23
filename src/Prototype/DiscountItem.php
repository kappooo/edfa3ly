<?php


namespace edfa3ly\Challenge\Prototype;


use edfa3ly\Challenge\Exceptions\NotFoundPropertyException;

class DiscountItem
{
    /**
     * @var float $discountPercentage
     */
    private $discountPercentage;

    /**
     * @var string $itemName
     */
    private $itemName;


    /**
     * @var float $discountValue
     */
    private $discountValue;

    /**
     * DiscountItem constructor.
     * @param float $discountPercentage
     * @param string $itemName
     * @param float $discountValue
     */
    public function __construct(float $discountPercentage, string  $itemName, float $discountValue)
    {
        $this->discountPercentage = $discountPercentage;
        $this->itemName = $itemName;
        $this->discountValue = $discountValue;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new NotFoundPropertyException();
    }
}
