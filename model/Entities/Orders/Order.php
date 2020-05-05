<?php
namespace Model\Entities\Orders;

use Model\Entities\Items\Collection as ItemsCollection;
use Model\Entities\Items\Item;
use DateTime;

interface Order {

    public function addItem(Item $item): self;

    public function getItems(): ItemsCollection;

    public function getOpenTime(): DateTime;

    public function getCloseTime(): DateTime;

    public function setCloseTime(DateTime $time): self;
}
