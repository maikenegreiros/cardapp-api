<?php
namespace Tests\Unit\Domains\Orders\ValueObjects\Destiny;

use PHPUnit\Framework\TestCase;
use Domain\Orders\ValueObjects\Destiny\Destiny;
use Domain\Orders\ValueObjects\Destiny\Table;

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
