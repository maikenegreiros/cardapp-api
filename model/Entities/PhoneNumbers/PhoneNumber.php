<?php
namespace Model\Entities\PhoneNumbers;

use Exception;

interface PhoneNumber {

    public function getPhoneNumber(): string;

    public function getDDI(): string;
}
