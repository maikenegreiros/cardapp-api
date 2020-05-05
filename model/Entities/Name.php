<?php
namespace Model\Entities;

class Name {
    private string $firstName;
    private ?string $lastName;

    public function __construct(string $firstName, ?string $lastName = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->lastName ?
            $this->firstName . " " . $this->lastName :
            $this->firstName;
    }

    public function __toString()
    {
        return $this->getFullName();
    }
}
