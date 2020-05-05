<?php
namespace Model\Entities;

class Destiny {
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAddress(): string
    {
        return $this->client->getAddress();
    }
}
