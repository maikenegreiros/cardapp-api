<?php
namespace Model\Entities\Orders;

use Model\Entities\Items\Collection as ItemsCollection;
use Model\Entities\Items\Item;
use Model\Entities\Client;
use Model\Entities\Table;
use Model\Entities\Staff;
use DateTime;

class LocalOrder implements Order {
    private ItemsCollection $items;
    private Table $table;
    private Staff $staff;
    private DateTime $openTime;
    private DateTime $closeTime;
    private ?Client $client;

    public function __construct(
        Table $table,
        Staff $staff,
        DateTime $openTime,
        ?Client $client = null
    ) {
        $this->table = $table;
        $this->staff = $staff;
        $this->openTime = $openTime;
        $this->client = $client;
        $this->items = new ItemsCollection;
    }

    public function addItem(Item $item): self
    {
        $this->items->add($item);
        return $this;
    }

    public function getTable(): Table
    {
        return $this->table;
    }

    public function getStaff(): Staff
    {
        return $this->staff;
    }

    public function getOpenTime(): DateTime
    {
        return $this->openTime;
    }

    public function getCloseTime(): DateTime
    {
        return $this->closeTime;
    }

    public function setCloseTime(DateTime $time): self
    {
        $this->closeTime = $time;
        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function getItems(): ItemsCollection
    {
        return $this->items;
    }
}
