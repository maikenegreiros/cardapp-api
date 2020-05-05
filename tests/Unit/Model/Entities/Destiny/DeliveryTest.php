<?php
namespace Tests\Unit\Model\Entities\Destiny;

use PHPUnit\Framework\TestCase;
use Model\Entities\Client;
use Model\Entities\Address;
use Model\Entities\Destiny\Destiny;
use Model\Entities\Destiny\Delivery;

class DeliveryTest extends TestCase {

    public function testInstance()
    {
        $client = $this->createStub(Client::class);
        $destiny = new Delivery($client);
        $this->assertTrue($destiny instanceof Destiny);
    }

    public function testGetLocation()
    {
        $fullAddress = 'Rua Maravilha, 96 - Centro';
        $address = $this->createStub(Address::class);
        $address->method('getFullAddress')->willReturn($fullAddress);

        $client = $this->createStub(Client::class);
        $client->method('getAddress')->willReturn($address);

        $destiny = new Delivery($client);
        $this->assertEquals($address->getFullAddress(), $destiny->getLocation());
    }
}
