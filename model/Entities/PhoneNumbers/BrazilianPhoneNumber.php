<?php
namespace Model\Entities\PhoneNumbers;

use Model\Exceptions\InvalidPhoneNumber;

class BrazilianPhoneNumber implements PhoneNumber {

    private int $phoneNumber;
    private int $ddd;

    public function __construct(int $ddd, int $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        $this->ddd = $ddd;
        $this->validate();
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getDDI(): string
    {
        return $this->ddi;
    }

    public function getDDD(): int
    {
        return $this->ddd;
    }

    private function validate()
    {
        if (!$this->isPhoneNumberValid() || !$this->isDDDValid()) {
            throw new InvalidPhoneNumber("A PhoneNumber must have a DDD with 2 digits and a number with 8 or 9 digits");
        }
    }

    private function isPhoneNumberValid(): bool
    {
        return $this->hasNumber9digitsAndFirstDigitIs9() || $this->hasNumber8digits();
    }

    private function isDDDValid(): bool
    {
        return \strlen($this->ddd) === 2;
    }

    private function hasNumber9digitsAndFirstDigitIs9()
    {
        return (\strlen($this->phoneNumber) === 9 && str_split($this->phoneNumber)[0] === "9");
    }

    private function hasNumber8digits()
    {
        return \strlen($this->phoneNumber) === 8;
    }
}
