<?php


namespace edfa3ly\Challenge\Exceptions;

use Exception;
use Throwable;

class NotFoundPropertyException extends Exception
{
    public function __construct($message = "This property in not exists in this class", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
