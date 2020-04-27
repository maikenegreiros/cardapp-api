<?php
namespace Domain\Orders\Entities;

use Domain\Orders\ValueObjects\Items\Collection as ItemsCollection;
use Domain\Orders\ValueObjects\Items\Item;
use Domain\Orders\ValueObjects\Client;
use Domain\Orders\ValueObjects\Destiny\Destiny;
use Domain\Orders\ValueObjects\Requesters\Requester;
use DateTime;

class OnlineOrder implements Order {
    private ItemsCollection $items;
    private Destiny $destiny;
    private Requester $requester;
    private DateTime $datetime;
    private Client $client;

    public function __construct(
        Destiny $destiny,
        Requester $requester,
        DateTime $datetime,
        Client $client
    ) {
        $this->destiny = $destiny;
        $this->requester = $requester;
        $this->datetime = $datetime;
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

    public function getRequester(): Requester
    {
        return $this->requester;
    }

    public function getDateTime(): DateTime
    {
        return $this->datetime;
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
