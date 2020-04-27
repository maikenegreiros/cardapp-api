<?php
namespace Tests\Unit\Domains\Orders\ValueObjects\Destiny;

use PHPUnit\Framework\TestCase;
use Domain\Orders\ValueObjects\Client;
use Domain\Orders\ValueObjects\Address;
use Domain\Orders\ValueObjects\Destiny\Destiny;
use Domain\Orders\ValueObjects\Destiny\Delivery;

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
