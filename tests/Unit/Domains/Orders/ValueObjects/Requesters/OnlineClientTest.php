<?php
namespace Tests\Unit\Domains\Orders\ValueObjects\Destiny;

use PHPUnit\Framework\TestCase;
use Domain\Orders\ValueObjects\Name;
use Domain\Orders\ValueObjects\Requesters\Requester;
use Domain\Orders\ValueObjects\Requesters\OnlineClient;

class OnlineClientTest extends TestCase {

    public function testGetInstance()
    {
        $name = $this->createStub(Name::class);
        $requester = new OnlineClient($name);
        $this->assertTrue($requester instanceof Requester);
    }

    public function testGetName()
    {
        $name = $this->createStub(Name::class);
        $requester = new OnlineClient($name);
        $this->assertEquals($name, $requester->getName());
    }
}
