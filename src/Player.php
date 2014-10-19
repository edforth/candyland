<?php

namespace Forthplace\Candyland;

class Player {
  public $name;
  public $age;
  public $stuck = FALSE;
  public $position = 0;

  public function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }

  public static function compareAges($a, $b) {
    if ($a->age == $b->age) {
      return 0;
    }
    return ($a->age < $b->age) ? -1 : 1;
  }
}
