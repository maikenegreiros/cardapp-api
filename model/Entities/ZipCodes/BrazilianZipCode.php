<?php
namespace Model\Entities\ZipCodes;

use Model\Exceptions\InvalidZipCode;

class BrazilianZipCode extends ZipCode {

    public function __construct(string $zipCode)
    {
        parent::__construct($zipCode);
    }

    protected function validate(string $zipCode): void
    {
        if(!$this->isZipCodeWellFormed($zipCode)) {
            throw new InvalidZipCode("Zip Code must have exactly 8 integer numbers");
        }
    }

    private function isZipCodeWellFormed(string $zipCode): bool
    {
        /**
         * Matches all strings with 5 numbers followed by a hyphen and more 3 numbers or
         * 8 numbers in a row
         */
        return preg_match('/\d{5}-?\d{3}/', $zipCode) === 1;
    }
}
