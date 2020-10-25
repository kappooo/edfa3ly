<?php


namespace edfa3ly\Challenge\Prototype\Promotion;


use edfa3ly\Challenge\Exceptions\NotFoundPropertyException;

class Action
{

    /**
     * @var string $applyOn
     */
    private string $applyOn;


    /**
     * @var string $type
     */
    private string $type;


    /**
     * @var float $value
     */
    private float $value;


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
     * @return string
     */
    public function getApplyOn() : string
    {
        return $this->applyOn;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @return float
     */
    public function getValue() : float
    {
        return $this->value;
    }
}
