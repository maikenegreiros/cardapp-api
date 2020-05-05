<?php
namespace Tests\Unit\Model\Entities;

use PHPUnit\Framework\TestCase;
use Model\Entities\Client;
use Model\Entities\Address;
use Model\Entities\Destiny;

class DestinyTest extends TestCase
{
    public function testGetLocation()
    {
        $fullAddress = 'Rua Maravilha, 96 - Centro';
        $address = $this->createStub(Address::class);
        $address->method('getFullAddress')->willReturn($fullAddress);

        $client = $this->createStub(Client::class);
        $client->method('getAddress')->willReturn($address);

        $destiny = new Destiny($client);
        $this->assertEquals($address->getFullAddress(), $destiny->getLocation());
    }
}
