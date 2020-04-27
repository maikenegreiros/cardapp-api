<?php
namespace Domain\Orders\ValueObjects;

use Domain\Orders\Exceptions\InvalidZipCode;
use Domain\Orders\ValueObjects\ZipCodes\ZipCode;

class Address {
    private string $street;
    private int $number;
    private string $neighborhood;
    private ZipCode $zipCode;

    public function __construct(
        string $street,
        int $number,
        string $neighborhood,
        string $city,
        string $state,
        string $country
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getZipCode(): ZipCode
    {
        return $this->zipCode;
    }

    public function setZipCode(ZipCode $zipCode): self
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getFullAddress(): string
    {
        $address = "$this->street, $this->number - $this->neighborhood, $this->city, $this->state - $this->country";
        return $address;
    }

    public function __toString()
    {
        return $this->getFullAddress();
    }
}
