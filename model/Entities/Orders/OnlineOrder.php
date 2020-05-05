<?php
namespace Model\Entities\Orders;

use Model\Entities\Items\Collection as ItemsCollection;
use Model\Entities\Items\Item;
use Model\Entities\Client;
use Model\Entities\Destiny;
use DateTime;

class OnlineOrder implements Order {
    private ItemsCollection $items;
    private Destiny $destiny;
    private DateTime $openTime;
    private DateTime $closeTime;
    private Client $client;

    public function __construct(
        Destiny $destiny,
        DateTime $openTime,
        Client $client
    ) {
        $this->destiny = $destiny;
        $this->openTime = $openTime;
        $this->client = $client;
        $this->items = new ItemsCollection;
    }

    public function addItem(Item $item): self
    {
        $this->items->add($item);
        return $this;
    }

    public function getDestiny(): Destiny
    {
        return $this->destiny;
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

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getItems(): ItemsCollection
    {
        return $this->items;
    }
}
