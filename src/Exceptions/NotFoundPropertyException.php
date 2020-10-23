<?php


namespace edfa3ly\Challenge\Exceptions;

use Exception;
use Throwable;

class NotFoundPropertyException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("This property in not exists in this class", $code, $previous);
    }
}
