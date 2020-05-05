<?php
namespace Tests\Unit\Model\Entities\Items\Categories;

use PHPUnit\Framework\TestCase;
use Model\Exceptions\InvalidCategory;
use Model\Entities\Items\Categories\Category;
use Model\Entities\Items\Categories\Collection as CategoryCollection;

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
