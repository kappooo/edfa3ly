<?php

namespace edfa3ly\Challenge\Prototype;

class CartReturn
{
    /**
     * @var float $totalTaxes
     */
    private float $totalTaxes;

    /**
     * @var float $totalDiscount
     */
    private float $totalDiscount;

    /**
     * @var float $subTotalPrice
     */
    private float $subTotalPrice;

    /**
     * @var array<DiscountItem> $discountItems
     */
    private array $discountItems;


    /**
     * CartReturn constructor.
     * @param float $totalTaxes
     * @param float $totalDiscount
     * @param array<DiscountItem> $discountItems
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
     * @return float
     */
    public function getTotalTaxes() : float
    {
        return $this->totalTaxes;
    }

    /**
     * @return float
     */
    public function getTotalDiscount() : float
    {
        return $this->totalDiscount;
    }

    /**
     * @return float
     */
    public function getSubTotalPrice() : float
    {
        return $this->subTotalPrice;
    }


    /**
     * @return array<DiscountItem>
     */
    public function getDiscountItems() : array
    {
        return $this->discountItems;
    }

    /**
     * @return float
     */
    public function getTotalPrice() : float
    {
        return ($this->getSubTotalPrice() + ($this->getTotalTaxes() - $this->getTotalDiscount()));
    }


    /**
     * @param float $value
     */
    public function setTotalTaxes(float  $value) : void
    {
        $this->totalTaxes = $value;
    }

    /**
     * @param float $value
     */
    public function setTotalDiscount(float  $value) : void
    {
        $this->totalDiscount = $value;
    }

    /**
     * @param float $value
     */
    public function setSubtotalPrice(float  $value) : void
    {
        $this->subTotalPrice = $value;
    }

}
