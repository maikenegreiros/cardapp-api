<?php
namespace Model\Entities;

use Model\Entities\Items\Collection as ItemsCollection;
use Model\Entities\Items\Item;
use Model\Entities\Client;
use Model\Entities\Destiny\Destiny;
use Model\Entities\Requesters\Requester;
use DateTime;

interface Order {

    public function addItem(Item $item): self;

    public function getDestiny(): Destiny;

    public function getRequester(): Requester;

    public function getDateTime(): DateTime;

    // public function getClient(): ?Client;

    public function getItems(): ItemsCollection;
}
