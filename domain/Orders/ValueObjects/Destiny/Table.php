<?php
namespace Domain\Orders\ValueObjects\Destiny;

class Table implements Destiny {

    private string $identifier;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getLocation(): string
    {
        return $this->identifier;
    }
}
