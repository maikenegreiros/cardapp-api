<?php
namespace Tests\Unit\Model\Entities;

use PHPUnit\Framework\TestCase;
use Model\Entities\Address;
use Model\Entities\ZipCodes\BrazilianZipCode;

class AddressTest extends TestCase {

    protected Address $validAddress;

    protected function setUp(): void
    {
        $street = "Rua dos Milagres";
        $number = 768;
        $neighborhood = "Centro";
        $city = "Jaguaribe";
        $state = "Ceará";
        $country = "Brasil";
        $this->validAddress = new Address(
            $street,
            $number,
            $neighborhood,
            $city,
            $state,
            $country
        );
    }

    public function testAddressInstance()
    {
        $this->assertTrue($this->validAddress instanceof Address);
    }

    public function testGetters()
    {
        $zipCode = $this->createStub(BrazilianZipCode::class);
        $this->validAddress->setZipCode($zipCode);

        $street = $this->validAddress->getStreet();
        $number = $this->validAddress->getNumber();
        $neighborhood = $this->validAddress->getNeighborhood();
        $city = $this->validAddress->getCity();
        $state = $this->validAddress->getState();
        $country = $this->validAddress->getCountry();

        $addressString = "{$street}, {$number} - {$neighborhood}, {$city}, {$state} - {$country}";

        $this->assertEquals($addressString, $this->validAddress->getFullAddress());
    }
}
