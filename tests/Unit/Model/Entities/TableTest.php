<?php
namespace Tests\Unit\Model\Entities;

use PHPUnit\Framework\TestCase;
use Model\Entities\Table;

class TableTest extends TestCase {

    public function testGetLocation()
    {
        $identifier = "20";
        $destiny = new Table($identifier);
        $this->assertEquals($identifier, $destiny->getIdentifier());
    }
}
