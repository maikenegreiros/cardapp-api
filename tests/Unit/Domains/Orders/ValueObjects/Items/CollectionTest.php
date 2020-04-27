<?php
namespace Tests\Unit\Domains\Orders\ValueObjects\Items;

use PHPUnit\Framework\TestCase;
use Domain\Orders\Exceptions\InvalidItem;
use Domain\Orders\ValueObjects\Items\Item;
use Domain\Orders\ValueObjects\Items\Collection as ItemsCollection;

class CollectionTest extends TestCase {

    public function testConstructCollection()
    {
        $item1 = $this->createStub(Item::class);
        $item2 = $this->createStub(Item::class);
        $collection = new ItemsCollection($item1, $item2);
        $this->assertTrue($collection instanceof ItemsCollection);
    }

    public function testAddItem()
    {
        $item = $this->createStub(Item::class);
        $item2 = $this->createStub(Item::class);
        $collection = new ItemsCollection;
        $collection->add($item);
        $collection->add($item2);

        $this->assertEquals($item, $collection->getAll()[0]);
        $this->assertEquals($item2, $collection->getAll()[1]);
    }

    public function testGetAll()
    {
        $item1 = $this->createStub(Item::class);
        $item2 = $this->createStub(Item::class);
        $collection = new ItemsCollection($item1, $item2);

        $this->assertEquals(2, $collection->getAll()->count());
    }

    public function testInvalidConstructor()
    {
        $this->expectException(InvalidItem::class);
        $collection = new ItemsCollection("");
    }
}
