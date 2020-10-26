<?php


namespace edfa3ly\Challenge\Prototype\Promotion;


class Rule
{
    /**
     * @var string $whenBuy
     */
    private string $whenBuy;


    /**
     * @var int $count
     */
    private int $count;


    /**
     * Rule constructor.
     * @param string $whenBuy
     * @param int $count
     */
    public function __construct(string $whenBuy, int $count)
    {
        $this->whenBuy = $whenBuy;
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getWhenBuy() :string
    {
        return $this->whenBuy;
    }

    /**
     * @return int
     */
    public function getCount() : int
    {
        return  $this->count;
    }
}
