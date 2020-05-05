<?php
namespace Model\Entities\Requesters;

use Model\Entities\Name;

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
