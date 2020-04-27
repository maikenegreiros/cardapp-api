<?php
namespace Domain\Orders\ValueObjects\Destiny;

use Domain\Orders\ValueObjects\Client;

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
