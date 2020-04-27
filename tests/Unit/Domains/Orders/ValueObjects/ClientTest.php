<?php
namespace Tests\Unit\Domains\Orders\ValueObjects;

use PHPUnit\Framework\TestCase;
use Domain\Orders\ValueObjects\Client;
use Domain\Orders\ValueObjects\Name;
use Domain\Orders\ValueObjects\Email;
use Domain\Orders\ValueObjects\Address;
use Domain\Orders\ValueObjects\PhoneNumbers\BrazilianPhoneNumber;

class ClientTest extends TestCase {

    public function testProvideOnlyRequiredArguments()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        $client = new Client($name, $address);
        $this->assertTrue($client instanceof Client);
    }

    public function testProvidePhoneNumber()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        $phoneNumber = $this->createStub(BrazilianPhoneNumber::class);
        $client = new Client($name, $address, $phoneNumber);
        $this->assertTrue($client instanceof Client);
    }

    public function testProvideEmail()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        $email = $this->createStub(Email::class);
        $client = new Client($name, $address, null, $email);
        $this->assertTrue($client instanceof Client);
    }

    public function testProvideAllArguments()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        $phoneNumber = $this->createStub(BrazilianPhoneNumber::class);
        $email = $this->createStub(Email::class);
        $client = new Client($name, $address, $phoneNumber, $email);
        $this->assertTrue($client instanceof Client);
    }

    public function testGetters()
    {
        $name = $this->createStub(Name::class);
        $address = $this->createStub(Address::class);
        $phoneNumber = $this->createStub(BrazilianPhoneNumber::class);
        $email = $this->createStub(Email::class);
        $client = new Client($name, $address, $phoneNumber, $email);

        $this->assertEquals($name, $client->getName());
        $this->assertEquals($address, $client->getAddress());
        $this->assertEquals($phoneNumber, $client->getPhoneNumber());
        $this->assertEquals($email, $client->getEmail());
    }
}
