<?php
namespace Tests\Unit\Model\Entities\Destiny;

use PHPUnit\Framework\TestCase;
use Model\Entities\Name;
use Model\Entities\Staff;

class StaffTest extends TestCase
{
    public function testGetName()
    {
        $name = $this->createStub(Name::class);
        $requester = new Staff($name);
        $this->assertEquals($name, $requester->getName());
    }
}
