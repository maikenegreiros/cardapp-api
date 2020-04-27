<?php
namespace Tests\Unit\Domains\Orders\ValueObjects\Items\Categories;

use PHPUnit\Framework\TestCase;
use Domain\Orders\Exceptions\InvalidCategory;
use Domain\Orders\ValueObjects\Items\Categories\Category;
use Domain\Orders\ValueObjects\Items\Categories\Collection as CategoryCollection;

class CollectionTest extends TestCase {
    
    public function testConstructCollection()
    {
        $category1 = $this->createStub(Category::class);
        $category2 = $this->createStub(Category::class);
        $collection = new CategoryCollection($category1, $category2);
        $this->assertTrue($collection instanceof CategoryCollection);
    }

    public function testAddCategory()
    {
        $category = $this->createStub(Category::class);
        $category2 = $this->createStub(Category::class);
        $collection = new CategoryCollection;
        $collection->add($category);
        $collection->add($category2);

        $this->assertEquals($category, $collection->getAll()[0]);
        $this->assertEquals($category2, $collection->getAll()[1]);
    }

    public function testGetAll()
    {
        $category1 = $this->createStub(Category::class);
        $category2 = $this->createStub(Category::class);
        $collection = new CategoryCollection($category1, $category2);

        $this->assertEquals(2, $collection->getAll()->count());
    }

    public function testInvalidConstructor()
    {
        $this->expectException(InvalidCategory::class);
        $collection = new CategoryCollection("");
    }
}
