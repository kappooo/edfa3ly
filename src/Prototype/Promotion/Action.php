<?php


namespace edfa3ly\Challenge\Prototype\Promotion;


use edfa3ly\Challenge\Exceptions\NotFoundPropertyException;

class Action
{

    /**
     * @var string $applyOn
     */
    private $applyOn;


    /**
     * @var string $type
     */
    private $type;


    /**
     * @var float $value
     */
    private $value;


    /**
     * Action constructor.
     * @param string $applyOn
     * @param string $type
     * @param float $value
     */
    public function __construct(string $applyOn, string $type, float $value)
    {
        $this->applyOn = $applyOn;
        $this->type = $type;
        $this->value = $value;
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
