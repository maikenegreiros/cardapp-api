<?php
namespace Model\Entities\Destiny;

use Model\Entities\Client;

class Delivery implements Destiny {

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getLocation(): string
    {
        return $this->client->getAddress()->getFullAddress();
    }
}
