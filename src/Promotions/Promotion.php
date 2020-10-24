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
    private $rule;


    /**
     * @var Action $action
     */
    private $action;


    /**
     * @param array $rule
     */
    public function addRule(Rule $rule) : void
    {
        $this->rule = $rule;
    }

    /**
     * @param array $rule
     */
    public function addAction(Action $action) : void
    {
        $this->action = $action;
    }

    /**
     * @param Product $product
     * @param array $items
     * @return bool
     */
    public function isItemEligibleForPromotion(Product $product, array $items) : bool
    {
        $productToBeFoundOnList = Mapper::getClassOfProduct($this->rule->whenBuy);
        $countOfProductToBeFoundOnList = 0;
        array_walk($items, function ($item) use ($productToBeFoundOnList, &$countOfProductToBeFoundOnList) {
           if (get_class($item) == get_class($productToBeFoundOnList)) {
               $countOfProductToBeFoundOnList++;
           }
        });
        if (
            $countOfProductToBeFoundOnList >= $this->rule->count &&
            get_class($product) == get_class(Mapper::getClassOfProduct($this->action->applyOn))
        ) {
            return true;
        }
       return false;
    }


    /**
     * @param Product $product
     * @param array $items
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
    private function applyAction(Product $product)
    {
        switch ($this->action->type) {
            case 'discount':
                $product->setDiscountPercentageValue($this->action->value);
                break;
            default :

        }
    }

}
