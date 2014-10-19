<?php

namespace Forthplace\Candyland;

class Card {
  public $type;
  public $double;

  public function __construct($type, $double = FALSE) {
    $this->type = $type;
    $this->double = $double;
  }
}
