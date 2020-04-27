<?php
namespace Domain\Orders\ValueObjects;

use Domain\Orders\Exceptions\InvalidEmail;

class Email {
    
    private string $address;

    public function __construct(string $address)
    {
        $this->validate($address);
        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    private function validate(string $address)
    {
        if (!$this->isValidAddress($address)) {
            throw new InvalidEmail("Email inválido");
        }
    }

    private function isValidAddress(string $email): bool
    {
        return preg_match('/^(\w+\.?-?\w+@\w+\.\w+)(\.\w+)?(\.\w+)?$/', $email) === 1;
    }
}
