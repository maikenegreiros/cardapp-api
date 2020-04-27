<?php
namespace Domain\Orders\Exceptions;

use Exception;

class InvalidCategory extends Exception {

    public function __construct(
        string $message = "Invalid Category",
        int $code = 0,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return $this->message;
    }
}
