<?php

class Player {
  public $name;
  public $age;
  public $stuck = FALSE;
  public $score = 0;

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
  }
}

$deck = new Deck();
$score = array(0,0,0,0);
$turn = 0;
$turnno = 0;
$activeplayer = 0;
$output = TRUE;
$licorice = array('unstuck', 'unstuck', 'unstuck', 'unstuck');
$players = array(
  new Player('Ed', 35),
  new Player('Ashley', 30),
  new Player('Sarah', 33),
  new Player('Jon', 34),
);

$board = array(
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

function doCard() {
  global $deck, $turn, $score, $activeplayer, $board;
  $card_index = $turn % 66;
  if ($card_index == 0) {
    $deck->shuffle();
  }
  switch ($deck->cards[$card_index]->type) {
    case 'red' :
    case 'purple' :
    case 'yellow' :
    case 'blue' :
    case 'orange' :
    case 'green' :
      $times = $deck->cards[$card_index]->double ? 2 : 1;
      for ($loop = 1; $loop <= $times; $loop++) {
        $position = $score[$activeplayer];
        while ($board[$position] != $deck->cards[$card_index]->type && $board[$position] != 'end') {
          $position++;
        }
        $score[$activeplayer] = $position;
      }
      break;
    case 'gingerbreadman' :
      $score[$activeplayer] = 9;
      break;
    case 'candycane' :
      $score[$activeplayer] = 20;
      break;
    case 'gumdrop' :
      $score[$activeplayer] = 42;
      break;
    case 'peanut' :
      $score[$activeplayer] = 69;
      break;
    case 'lollypop' :
      $score[$activeplayer] = 92;
      break;
    case 'icecream' :
      $score[$activeplayer] = 102;
      break;
    default :
      echo 'ERROR: No card value';
      break;
  }
}

function findYoungest() {
  global $activeplayer, $players;
  $comparison_players = $players;
  usort($comparison_players, array('Player', 'compareAges'));
  $youngest_player = array_shift($comparison_players);
  $active_player = array_search($youngest_player, $players);
}

function report() {
  global $players, $activeplayer, $deck, $turn, $score, $licorice;
  echo 'Turn #' . $turn . ': ' . $players[$activeplayer]->name . ' drew ';
  $card_index = $turn % 66;
  echo $deck->cards[$card_index]->double ? 'double ' : '';
  echo $deck->cards[$card_index]->type . '. Moved to square ' . $score[$activeplayer] . '<br/>';
  if ($licorice[$activeplayer] == 'stuck') {
    echo 'STUCK IN LICORICE SWAMP, LOSE NEXT TURN<br/>';
  }
}

function checkBoard() {
  global $score, $activeplayer, $licorice, $output;
  if (in_array($score[$activeplayer], array(46, 86, 117))) {
    $licorice[$activeplayer] = 'stuck';
  }
  if ($score[$activeplayer] == 5) {
    $score[$activeplayer] = 59;
    if ($output == 'true') {
      echo 'Following Player TOOK A BRIDGE<br />';
    }
  }
  if ($score[$activeplayer] == 35) {
    $score[$activeplayer] = 45;
    if ($output == 'true') {
      echo 'Following Player TOOK A BRIDGE<br />';
    }
  }
}

function playgame() {
  global $deck, $score, $players, $activeplayer, $turn, $licorice, $output, $turnno;
  findYoungest();
  $deck->shuffle();
  while (1) {
    if ($licorice[$activeplayer] == 'stuck') {
      $licorice[$activeplayer] = 'unstuck';
      if ($output == 'true') {
        echo 'Turn #' . $turn . ' ' . $players[$activeplayer]->name . ' is stuck in the swamp &nbsp; &nbsp; <br>';
      }
      if ($activeplayer >= 3) {
        $activeplayer = 0;
      }
      else {
        $activeplayer++;
      }
      continue;
    }
    $turn++;
    doCard();
    checkBoard();
    if ($output == 'true') {
      report();
    }
    if ($score[$activeplayer] == 134 && $output == 'true') {
      echo 'Congratulations ' . $players[$activeplayer]->name . ' You Win!';
      exit;
    }
    elseif ($score[$activeplayer] == 134) {
      echo 'Congratulations ' . $players[$activeplayer]->name . ' You won in ' . $turn . ' turns!';
      exit;
    }
    if ($activeplayer >= 3) {
      $activeplayer = 0;
    }
    else {
      $activeplayer++;
    }
  }
}

playgame();
