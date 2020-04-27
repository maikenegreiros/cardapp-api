<?php
namespace Domain\Orders\ValueObjects\Items;

use Domain\Orders\ValueObjects\Items\Categories\Category;

class Item {

    private string $title;
    private Category $category;

    public function __construct(string $title, Category $category)
    {
        $this->title = $title;
        $this->category = $category;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
