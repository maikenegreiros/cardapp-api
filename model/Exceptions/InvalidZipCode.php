<?php
namespace Model\Exceptions;

use Exception;

class InvalidZipCode extends Exception {
    public function __construct(
        string $message = "Invalid ZipCode",
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
