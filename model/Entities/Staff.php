<?php
namespace Model\Entities;

use Model\Entities\Name;

class Staff
{
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
