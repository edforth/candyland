<?php

namespace Forthplace\Candyland;

class Game {
  public $deck;
  public $board = array(
    0 => 'start',
    1 => 'red',
    2 => 'purple',
    3 => 'yellow',
    4 => 'blue',
    5 => 'orange',
    6 => 'green',
    7 => 'red',
    8 => 'purple',
    9 => 'gingerbreadman',
    10 => 'yellow',
    11 => 'blue',
    12 => 'orange',
    13 => 'green',
    14 => 'red',
    15 => 'purple',
    16 => 'yellow',
    17 => 'blue',
    18 => 'orange',
    19 => 'green',
    20 => 'candycane',
    21 => 'red',
    22 => 'purple',
    23 => 'yellow',
    24 => 'blue',
    25 => 'orange',
    26 => 'green',
    27 => 'red',
    28 => 'purple',
    29 => 'yellow',
    30 => 'blue',
    31 => 'orange',
    32 => 'green',
    33 => 'red',
    34 => 'purple',
    35 => 'yellow',
    36 => 'blue',
    37 => 'orange',
    38 => 'green',
    39 => 'red',
    40 => 'purple',
    41 => 'yellow',
    42 => 'gumdrop',
    43 => 'blue',
    44 => 'orange',
    45 => 'green',
    46 => 'red',
    47 => 'purple',
    48 => 'yellow',
    49 => 'blue',
    50 => 'orange',
    51 => 'green',
    52 => 'red',
    53 => 'purple',
    54 => 'yellow',
    55 => 'blue',
    56 => 'orange',
    57 => 'green',
    58 => 'red',
    59 => 'purple',
    60 => 'yellow',
    61 => 'blue',
    62 => 'orange',
    63 => 'green',
    64 => 'red',
    65 => 'purple',
    66 => 'yellow',
    67 => 'blue',
    68 => 'orange',
    69 => 'peanut',
    70 => 'green',
    71 => 'red',
    72 => 'purple',
    73 => 'yellow',
    74 => 'blue',
    75 => 'orange',
    76 => 'green',
    77 => 'red',
    78 => 'purple',
    79 => 'yellow',
    80 => 'blue',
    81 => 'orange',
    82 => 'green',
    83 => 'red',
    84 => 'purple',
    85 => 'yellow',
    86 => 'blue',
    87 => 'orange',
    88 => 'green',
    89 => 'red',
    90 => 'purple',
    91 => 'yellow',
    92 => 'lollypop',
    93 => 'blue',
    94 => 'orange',
    95 => 'green',
    96 => 'red',
    97 => 'purple',
    98 => 'yellow',
    99 => 'blue',
    100 => 'orange',
    101 => 'green',
    102 => 'icecream',
    103 => 'red',
    104 => 'purple',
    105 => 'yellow',
    106 => 'blue',
    107 => 'orange',
    108 => 'green',
    109 => 'red',
    110 => 'purple',
    111 => 'yellow',
    112 => 'blue',
    113 => 'orange',
    114 => 'green',
    115 => 'red',
    116 => 'purple',
    117 => 'yellow',
    118 => 'blue',
    119 => 'orange',
    120 => 'green',
    121 => 'red',
    122 => 'purple',
    123 => 'yellow',
    124 => 'blue',
    125 => 'orange',
    126 => 'green',
    127 => 'red',
    128 => 'purple',
    129 => 'yellow',
    130 => 'blue',
    131 => 'orange',
    132 => 'green',
    133 => 'red',
    134 => 'end',
  );
  public $players = array();
  public $active_player;
  public $turn;

  public function __construct() {
    $this->deck = new Deck;
    $this->players = array(
      new Player('Ed', 35),
      new Player('Ashley', 30),
      new Player('Sarah', 33),
      new Player('Jon', 34),
    );
    $this->active_player = $this->determineYoungestPlayer();
  }

  public function determineYoungestPlayer() {
    $comparison_players = $this->players;
    usort($comparison_players, array('\Forthplace\Candyland\Player', 'compareAges'));
    $youngest_player = array_shift($comparison_players);
    return array_search($youngest_player, $this->players);
  }

  public function takeCard() {
    $card_index = $this->turn++ % 66;
    if ($card_index == 0) {
      $this->deck->shuffle();
    }

    $card = $this->deck->cards[$card_index];

    switch ($card->type) {
      case 'red' :
      case 'purple' :
      case 'yellow' :
      case 'blue' :
      case 'orange' :
      case 'green' :
        $times = $this->deck->cards[$card_index]->double ? 2 : 1;
        for ($loop = 1; $loop <= $times; $loop++) {
          $position = $this->players[$this->active_player]->position;
          while ($this->board[$position] != $card->type && $this->board[$position] != 'end') {
            $position++;
          }
          $this->players[$this->active_player]->position = $position;
        }
        break;
      case 'gingerbreadman' :
        $this->players[$this->active_player]->position = 9;
        break;
      case 'candycane' :
        $this->players[$this->active_player]->position = 20;
        break;
      case 'gumdrop' :
        $this->players[$this->active_player]->position = 42;
        break;
      case 'peanut' :
        $this->players[$this->active_player]->position = 69;
        break;
      case 'lollypop' :
        $this->players[$this->active_player]->position = 92;
        break;
      case 'icecream' :
        $this->players[$this->active_player]->position = 102;
        break;
      default :
        throw new Exception('No card value; aborting');
        break;
    }

    $message = 'Turn #' . $this->turn . ': ' . $this->players[$this->active_player]->name . ' drew ';
    $message .= $card->double ? 'double ' : '';
    $message .= $card->type . ', then moved to square ' . $this->players[$this->active_player]->position . '.';

    if ($this->players[$this->active_player]->stuck) {
      $message .= ' Got stuck in the Licorice Space, will lose the next turn.';
    }
    if (in_array($this->players[$this->active_player]->position, array(46, 86, 117))) {
      $this->players[$this->active_player]->stuck = TRUE;
    }
    if ($this->players[$this->active_player]->position == 5) {
      $this->players[$this->active_player]->position = 59;
      $message .= ' Shortcut! Leaped way ahead and ended on square 59.';
    }
    if ($this->players[$this->active_player]->position == 35) {
      $this->players[$this->active_player]->position = 45;
      $message .= ' Shortcut! Got a little further ahead and ended on square 45.';
    }

    render($message);
  }

  public function play() {
    // Game loop.
    while (1) {
      // Player has lost a turn.
      if ($this->players[$this->active_player]->stuck) {
        $this->players[$this->active_player]->stuck = FALSE;
        render('Turn #' . $this->turn . ': ' . $this->players[$this->active_player]->name . ' is stuck in the Licorice Space.');
      }
      // Normal turn.
      else {
        $this->takeCard();
        if ($this->players[$this->active_player]->position == 134) {
          render('Congratulations ' . $this->players[$this->active_player]->name . ', you won in ' . $this->turn . ' turns!');
          exit;
        }
      }
      // Select next player.
      if ($this->active_player >= 3) {
        $this->active_player = 0;
      }
      else {
        $this->active_player++;
      }
    }
  }
}
