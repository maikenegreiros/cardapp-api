<?php
namespace Tests\Unit\Model\Entities\Destiny;

use PHPUnit\Framework\TestCase;
use Model\Entities\Name;
use Model\Entities\Requesters\Requester;
use Model\Entities\Requesters\Staff;

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
