<?php
namespace Model\Exceptions;

use Exception;

class InvalidPhoneNumber extends Exception {

    public function __construct(string $message, int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString(): string
    {
        return $this->message;
    }
}
