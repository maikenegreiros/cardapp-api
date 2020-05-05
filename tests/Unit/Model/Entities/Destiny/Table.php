<?php
namespace Tests\Unit\Model\Entities\Destiny;

use PHPUnit\Framework\TestCase;
use Model\Entities\Destiny\Destiny;
use Model\Entities\Destiny\Table;

class TableTest extends TestCase {

    public function testInstance()
    {
        $destiny = new Table($client);
        $this->assertTrue($destiny instanceof Destiny);
    }

    public function testGetLocation()
    {
        $identifier = "20";
        $destiny = new Table($identifier);
        $this->assertEquals($identifier, $destiny->getLocation());
    }
}
