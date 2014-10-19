<?php

function render($message) {
  $html = FALSE;
  if ($html) {
    echo '<p>' . $message . '</p>';
  }
  else {
    echo "$message\n";
  }
}

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

class Card {
  public $type;
  public $double;

  public function __construct($type, $double = FALSE) {
    $this->type = $type;
    $this->double = $double;
  }
}

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
    usort($comparison_players, array('Player', 'compareAges'));
    $youngest_player = array_shift($comparison_players);
    return array_search($youngest_player, $this->players);
  }
}

$game = new Game();

$turn = 0;
$output = TRUE;

function doCard() {
  global $game;
  $card_index = $game->turn % 66;
  if ($card_index == 0) {
    $game->deck->shuffle();
  }
  switch ($game->deck->cards[$card_index]->type) {
    case 'red' :
    case 'purple' :
    case 'yellow' :
    case 'blue' :
    case 'orange' :
    case 'green' :
      $times = $game->deck->cards[$card_index]->double ? 2 : 1;
      for ($loop = 1; $loop <= $times; $loop++) {
        $position = $game->players[$game->activeplayer]->position;
        while ($game->board[$position] != $game->deck->cards[$card_index]->type && $game->board[$position] != 'end') {
          $position++;
        }
        $game->players[$game->activeplayer]->position = $position;
      }
      break;
    case 'gingerbreadman' :
      $game->players[$game->activeplayer]->position = 9;
      break;
    case 'candycane' :
      $game->players[$game->activeplayer]->position = 20;
      break;
    case 'gumdrop' :
      $game->players[$game->activeplayer]->position = 42;
      break;
    case 'peanut' :
      $game->players[$game->activeplayer]->position = 69;
      break;
    case 'lollypop' :
      $game->players[$game->activeplayer]->position = 92;
      break;
    case 'icecream' :
      $game->players[$game->activeplayer]->position = 102;
      break;
    default :
      throw new Exception('No card value; aborting');
      break;
  }
}

function report() {
  global $game;

  $message = 'Turn #' . $game->turn . ': ' . $game->players[$game->activeplayer]->name . ' drew ';
  $card_index = $game->turn % 66;
  $message .= $game->deck->cards[$card_index]->double ? 'double ' : '';
  $message .= $game->deck->cards[$card_index]->type . ', then moved to square ' . $game->players[$game->activeplayer]->position . '.';
  if ($game->players[$game->activeplayer]->stuck) {
    $message .= ' Got stuck in the licorice swamp, will lose the next turn.';
  }
  render($message);
}

function checkBoard() {
  global $game, $output;
  if (in_array($game->players[$game->activeplayer]->position, array(46, 86, 117))) {
    $game->players[$game->activeplayer]->stuck = TRUE;
  }
  if ($game->players[$game->activeplayer]->position == 5) {
    $game->players[$game->activeplayer]->position = 59;
    if ($output === TRUE) {
      render($game->players[$game->activeplayer]->name . ' took a shortcut.');
    }
  }
  if ($game->players[$game->activeplayer]->position == 35) {
    $game->players[$game->activeplayer]->position = 45;
    if ($output === TRUE) {
      render($game->players[$game->activeplayer]->name . ' took a shortcut.');
    }
  }
}

function playgame() {
  global $game, $output;
  // Game loop.
  while (1) {
    // Player has lost a turn.
    if ($game->players[$game->activeplayer]->stuck) {
      $game->players[$game->activeplayer]->stuck = FALSE;
      if ($output === TRUE) {
        render('Turn #' . $game->turn . ': ' . $game->players[$game->activeplayer]->name . ' is stuck in the Licorice Space.');
      }
    }
    // Normal turn.
    else {
      doCard();
      $game->turn++;
      checkBoard();
      if ($output === TRUE) {
        report();
      }
      if ($game->players[$game->activeplayer]->position == 134) {
        render('Congratulations ' . $game->players[$game->activeplayer]->name . ', you won ' . $game->turn . ' turns!');
        exit;
      }
    }
    // Select next player.
    if ($game->activeplayer >= 3) {
      $game->activeplayer = 0;
    }
    else {
      $game->activeplayer++;
    }
  }
}

playgame();
