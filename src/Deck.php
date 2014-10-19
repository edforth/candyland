<?php

namespace Forthplace\Candyland;

class Deck {
  public $cards;

  public function __construct() {
    $this->cards = array();

    // Color cards.
    $colors = array(
      'red',
      'purple',
      'yellow',
      'blue',
      'orange',
      'green',
    );
    foreach ($colors as $color) {
      for ($i = 0; $i < 8; $i++) {
        $this->cards[] = new Card($color);
      }
      for ($i = 0; $i < 2; $i++) {
        $this->cards[] = new Card($color, TRUE);
      }
    }

    // Warp cards.
    $warps = array(
      'gingerbreadman',
      'candycane',
      'gumdrop',
      'peanut',
      'lollypop',
      'icecream',
    );
    foreach ($warps as $destination) {
      $this->cards[] = new Card($destination);
    }
  }

  public function shuffle() {
    shuffle($this->cards);
    render('Shuffled the deck.');
  }
}
