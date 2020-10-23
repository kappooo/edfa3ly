<?php


namespace edfa3ly\Challenge\Tax;


interface ITax
{
    /**
     * @return float
     */
    public function getTaxValue() : float;
}
