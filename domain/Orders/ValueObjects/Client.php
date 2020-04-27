<?php
namespace Domain\Orders\ValueObjects;

use Domain\Orders\ValueObjects\PhoneNumbers\PhoneNumber;

class Client {

    private Name $name;
    private Address $address;
    private ?PhoneNumber $phoneNumber;
    private ?Email $email;

    public function __construct(
        Name $name,
        Address $address,
        ?PhoneNumber $phoneNumber = null,
        ?Email $email = null
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getPhoneNumber(): ?PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function getEmail(): ?Email
    {
        return $this->email;
    }
}
