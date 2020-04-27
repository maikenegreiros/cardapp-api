<?php
namespace Domain\Orders\Entities;

use Domain\Orders\ValueObjects\Items\Collection as ItemsCollection;
use Domain\Orders\ValueObjects\Items\Item;
use Domain\Orders\ValueObjects\Client;
use Domain\Orders\ValueObjects\Destiny\Destiny;
use Domain\Orders\ValueObjects\Requesters\Requester;
use DateTime;

interface Order {

    public function addItem(Item $item): self;

    public function getDestiny(): Destiny;

    public function getRequester(): Requester;

    public function getDateTime(): DateTime;

    // public function getClient(): ?Client;

    public function getItems(): ItemsCollection;
}
