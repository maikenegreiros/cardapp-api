<?php
namespace Model\Entities\Items\Categories;

use ArrayObject;
use Model\Exceptions\InvalidCategory;

class Collection {

    private ArrayObject $collection;

    public function __construct(... $categories)
    {
        $this->collection = new ArrayObject;
        foreach($categories as $category) {
            $this->checkIfIsACategory($category);
            $this->collection->append($category);
        }
    }

    public function add(Category $category): self
    {
        $this->collection->append($category);
        return $this;
    }

    public function getAll(): ArrayObject
    {
        return $this->collection;
    }

    private function checkIfIsACategory($category)
    {
        if (!($category instanceof Category)) {
            throw new InvalidCategory(self::class . " only accepts objects of type" . self::class . "in its constructor");
        }
    }
}
