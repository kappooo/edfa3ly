<?php


namespace edfa3ly\Challenge\Prototype\Promotion;


use edfa3ly\Challenge\Exceptions\NotFoundPropertyException;

class Rule
{
    /**
     * @var string $whenBuy
     */
    private $whenBuy;


    /**
     * @var int $count
     */
    private $count;


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
