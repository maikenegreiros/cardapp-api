<?php
namespace Domain\Orders\ValueObjects\Items;

use ArrayObject;
use Domain\Orders\Exceptions\InvalidItem;

class Collection {

    private ArrayObject $collection;

    public function __construct(... $items)
    {
        $this->collection = new ArrayObject;
        foreach($items as $item) {
            $this->checkIfIsAnItem($item);
            $this->collection->append($item);
        }
    }

    public function add(Item $item): self
    {
        $this->collection->append($item);
        return $this;
    }

    public function getAll(): ArrayObject
    {
        return $this->collection;
    }

    private function checkIfIsAnItem($item)
    {
        if (!($item instanceof Item)) {
            throw new InvalidItem(self::class . " only accepts objects of type" . self::class . "in its constructor");
        }
    }
}
