<?php


namespace edfa3ly\Challenge\Promotions;

use edfa3ly\Challenge\Mapper;
use edfa3ly\Challenge\Products\Product;
use edfa3ly\Challenge\Prototype\Promotion\Action;
use edfa3ly\Challenge\Prototype\Promotion\Rule;

class Promotion
{
    /**
     * @var  Rule $rule
     */
    private Rule $rule;


    /**
     * @var Action $action
     */
    private Action $action;


    /**
     * @param Rule $rule
     */
    public function addRule(Rule $rule) : void
    {
        $this->rule = $rule;
    }

    /**
     * @param Action $action
     */
    public function addAction(Action $action) : void
    {
        $this->action = $action;
    }

    /**
     * @param Product $product
     * @param array<Product> $items
     * @return bool
     */
    public function isItemEligibleForPromotion(Product $product, array $items) : bool
    {
        $productToBeFoundOnList = Mapper::getClassOfProduct($this->rule->getWhenBuy());
        $countOfProductToBeFoundOnList = 0;
        array_walk($items, function ($item) use ($productToBeFoundOnList, &$countOfProductToBeFoundOnList) {
           if (get_class($item) == get_class($productToBeFoundOnList)) {
               $countOfProductToBeFoundOnList++;
           }
        });
        if (
            $countOfProductToBeFoundOnList >= $this->rule->getCount() &&
            get_class($product) == get_class(Mapper::getClassOfProduct($this->action->getApplyOn()))
        ) {
            return true;
        }
       return false;
    }


    /**
     * @param Product $product
     * @param array<Product> $items
     */
    public function applyPromotionIfEligible(Product $product, array $items) : void
    {
        if ($this->isItemEligibleForPromotion($product, $items)) {
            $this->applyAction($product);
        }
    }

    /**
     * @param Product $product
     */
    private function applyAction(Product $product) : void
    {
        switch ($this->action->getType()) {
            case 'discount':
                $product->setDiscountPercentageValue($this->action->getValue());
                break;
        }
    }

}
