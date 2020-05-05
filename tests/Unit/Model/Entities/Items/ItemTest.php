<?php
namespace Tests\Unit\Model\Entities\Items;

use PHPUnit\Framework\TestCase;
use Model\Entities\Items\Item;
use Model\Entities\Items\Categories\Category;

class ItemTest extends TestCase {

    private string $title;
    private Category $category;
    private Item $item;

    public function setUp(): void
    {
        $this->title = "Coxinha de Frango";
        $this->category = $this->createStub(Category::class);
        $this->item = new Item($this->title, $this->category);
    }

    public function testGetTitle()
    {
        $this->assertEquals($this->title, $this->item->getTitle());
    }

    public function testGetCategory()
    {
        $this->assertEquals($this->category, $this->item->getCategory());
    }
}