<?php
namespace Domain\Orders\ValueObjects\Requesters;

use Domain\Orders\ValueObjects\Name;

abstract class Requester {

    protected Name $name;

    public function __construct(Name $name)
    {
        $this->name = $name;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}
