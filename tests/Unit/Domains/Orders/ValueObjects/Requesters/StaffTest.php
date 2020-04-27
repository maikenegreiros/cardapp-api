<?php
namespace Tests\Unit\Domains\Orders\ValueObjects\Destiny;

use PHPUnit\Framework\TestCase;
use Domain\Orders\ValueObjects\Name;
use Domain\Orders\ValueObjects\Requesters\Requester;
use Domain\Orders\ValueObjects\Requesters\Staff;

class StaffTest extends TestCase {

    public function testGetInstance()
    {
        $name = $this->createStub(Name::class);
        $requester = new Staff($name);
        $this->assertTrue($requester instanceof Requester);
    }

    public function testGetName()
    {
        $name = $this->createStub(Name::class);
        $requester = new Staff($name);
        $this->assertEquals($name, $requester->getName());
    }
}
