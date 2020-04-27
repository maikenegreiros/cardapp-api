<?php
namespace Domain\Orders\ValueObjects\PhoneNumbers;

use Exception;

interface PhoneNumber {

    public function getPhoneNumber(): string;

    public function getDDI(): string;
}
