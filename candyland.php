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

function incRed() {
  global $deck, $turn, $score, $activeplayer;
  $times = $deck->cards[$turn]->double ? 2 : 1;
  for ($loop = 1; $loop <= $times; $loop++) {
    if ($score[$activeplayer] >= 133) {
      $score[$activeplayer] = 134;
    }
    elseif ($score[$activeplayer] >= 127) {
      $score[$activeplayer] = 133;
    }
    elseif ($score[$activeplayer] >= 121) {
      $score[$activeplayer] = 127;
    }
    elseif ($score[$activeplayer] >= 115) {
      $score[$activeplayer] = 121;
    }
    elseif ($score[$activeplayer] >= 109) {
      $score[$activeplayer] = 115;
    }
    elseif ($score[$activeplayer] >= 103) {
      $score[$activeplayer] = 109;
    }
    elseif ($score[$activeplayer] >= 96) {
      $score[$activeplayer] = 103;
    }
    elseif ($score[$activeplayer] >= 89) {
      $score[$activeplayer] = 96;
    }
    elseif ($score[$activeplayer] >= 83) {
      $score[$activeplayer] = 89;
    }
    elseif ($score[$activeplayer] >= 77) {
      $score[$activeplayer] = 83;
    }
    elseif ($score[$activeplayer] >= 71) {
      $score[$activeplayer] = 77;
    }
    elseif ($score[$activeplayer] >= 64) {
      $score[$activeplayer] = 71;
    }
    elseif ($score[$activeplayer] >= 58) {
      $score[$activeplayer] = 64;
    }
    elseif ($score[$activeplayer] >= 52) {
      $score[$activeplayer] = 58;
    }
    elseif ($score[$activeplayer] >= 46) {
      $score[$activeplayer] = 52;
    }
    elseif ($score[$activeplayer] >= 39) {
      $score[$activeplayer] = 46;
    }
    elseif ($score[$activeplayer] >= 33) {
      $score[$activeplayer] = 39;
    }
    elseif ($score[$activeplayer] >= 27) {
      $score[$activeplayer] = 33;
    }
    elseif ($score[$activeplayer] >= 21) {
      $score[$activeplayer] = 27;
    }
    elseif ($score[$activeplayer] >= 14) {
      $score[$activeplayer] = 21;
    }
    elseif ($score[$activeplayer] >= 7) {
      $score[$activeplayer] = 14;
    }
    elseif ($score[$activeplayer] >= 1) {
      $score[$activeplayer] = 7;
    }
    elseif ($score[$activeplayer] <= 0) {
      $score[$activeplayer] = 1;
    }
  }
}

function incPurple() {
  global $deck, $turn, $score, $activeplayer;
  $times = $deck->cards[$turn]->double ? 2 : 1;
  for ($loop = 1; $loop <= $times; $loop++) {
    if ($score[$activeplayer] >= 128) {
      $score[$activeplayer] = 134;
    }
    elseif ($score[$activeplayer] >= 122) {
      $score[$activeplayer] = 128;
    }
    elseif ($score[$activeplayer] >= 116) {
      $score[$activeplayer] = 122;
    }
    elseif ($score[$activeplayer] >= 110) {
      $score[$activeplayer] = 116;
    }
    elseif ($score[$activeplayer] >= 104) {
      $score[$activeplayer] = 110;
    }
    elseif ($score[$activeplayer] >= 97) {
      $score[$activeplayer] = 104;
    }
    elseif ($score[$activeplayer] >= 90) {
      $score[$activeplayer] = 97;
    }
    elseif ($score[$activeplayer] >= 84) {
      $score[$activeplayer] = 90;
    }
    elseif ($score[$activeplayer] >= 78) {
      $score[$activeplayer] = 84;
    }
    elseif ($score[$activeplayer] >= 72) {
      $score[$activeplayer] = 78;
    }
    elseif ($score[$activeplayer] >= 65) {
      $score[$activeplayer] = 72;
    }
    elseif ($score[$activeplayer] >= 59) {
      $score[$activeplayer] = 65;
    }
    elseif ($score[$activeplayer] >= 53) {
      $score[$activeplayer] = 59;
    }
    elseif ($score[$activeplayer] >= 47) {
      $score[$activeplayer] = 53;
    }
    elseif ($score[$activeplayer] >= 40) {
      $score[$activeplayer] = 47;
    }
    elseif ($score[$activeplayer] >= 34) {
      $score[$activeplayer] = 40;
    }
    elseif ($score[$activeplayer] >= 28) {
      $score[$activeplayer] = 34;
    }
    elseif ($score[$activeplayer] >= 22) {
      $score[$activeplayer] = 28;
    }
    elseif ($score[$activeplayer] >= 15) {
      $score[$activeplayer] = 22;
    }
    elseif ($score[$activeplayer] >= 8) {
      $score[$activeplayer] = 15;
    }
    elseif ($score[$activeplayer] >= 2) {
      $score[$activeplayer] = 8;
    }
    elseif ($score[$activeplayer] <= 0) {
      $score[$activeplayer] = 2;
    }
  }
}

function incYellow() {
  global $deck, $turn, $score, $activeplayer;
  $times = $deck->cards[$turn]->double ? 2 : 1;
  for ($loop = 1; $loop <= $times; $loop++) {
    if ($score[$activeplayer] >= 129) {
      $score[$activeplayer] = 134;
    }
    elseif ($score[$activeplayer] >= 123) {
      $score[$activeplayer] = 129;
    }
    elseif ($score[$activeplayer] >= 117) {
      $score[$activeplayer] = 123;
    }
    elseif ($score[$activeplayer] >= 111) {
      $score[$activeplayer] = 117;
    }
    elseif ($score[$activeplayer] >= 105) {
      $score[$activeplayer] = 111;
    }
    elseif ($score[$activeplayer] >= 98) {
      $score[$activeplayer] = 105;
    }
    elseif ($score[$activeplayer] >= 91) {
      $score[$activeplayer] = 98;
    }
    elseif ($score[$activeplayer] >= 85) {
      $score[$activeplayer] = 91;
    }
    elseif ($score[$activeplayer] >= 79) {
      $score[$activeplayer] = 85;
    }
    elseif ($score[$activeplayer] >= 73) {
      $score[$activeplayer] = 79;
    }
    elseif ($score[$activeplayer] >= 66) {
      $score[$activeplayer] = 73;
    }
    elseif ($score[$activeplayer] >= 60) {
      $score[$activeplayer] = 66;
    }
    elseif ($score[$activeplayer] >= 54) {
      $score[$activeplayer] = 60;
    }
    elseif ($score[$activeplayer] >= 48) {
      $score[$activeplayer] = 54;
    }
    elseif ($score[$activeplayer] >= 41) {
      $score[$activeplayer] = 48;
    }
    elseif ($score[$activeplayer] >= 35) {
      $score[$activeplayer] = 41;
    }
    elseif ($score[$activeplayer] >= 29) {
      $score[$activeplayer] = 35;
    }
    elseif ($score[$activeplayer] >= 23) {
      $score[$activeplayer] = 29;
    }
    elseif ($score[$activeplayer] >= 16) {
      $score[$activeplayer] = 23;
    }
    elseif ($score[$activeplayer] >= 10) {
      $score[$activeplayer] = 16;
    }
    elseif ($score[$activeplayer] >= 3) {
      $score[$activeplayer] = 10;
    }
    elseif ($score[$activeplayer] <= 0) {
      $score[$activeplayer] = 3;
    }
  }
}

function incBlue() {
  global $deck, $turn, $score, $activeplayer;
  $times = $deck->cards[$turn]->double ? 2 : 1;
  for ($loop = 1; $loop <= $times; $loop++) {
    if ($score[$activeplayer] >= 130) {
      $score[$activeplayer] = 134;
    }
    elseif ($score[$activeplayer] >= 124) {
      $score[$activeplayer] = 130;
    }
    elseif ($score[$activeplayer] >= 118) {
      $score[$activeplayer] = 124;
    }
    elseif ($score[$activeplayer] >= 112) {
      $score[$activeplayer] = 118;
    }
    elseif ($score[$activeplayer] >= 106) {
      $score[$activeplayer] = 112;
    }
    elseif ($score[$activeplayer] >= 99) {
      $score[$activeplayer] = 106;
    }
    elseif ($score[$activeplayer] >= 93) {
      $score[$activeplayer] = 99;
    }
    elseif ($score[$activeplayer] >= 86) {
      $score[$activeplayer] = 93;
    }
    elseif ($score[$activeplayer] >= 80) {
      $score[$activeplayer] = 86;
    }
    elseif ($score[$activeplayer] >= 74) {
      $score[$activeplayer] = 80;
    }
    elseif ($score[$activeplayer] >= 67) {
      $score[$activeplayer] = 74;
    }
    elseif ($score[$activeplayer] >= 61) {
      $score[$activeplayer] = 67;
    }
    elseif ($score[$activeplayer] >= 55) {
      $score[$activeplayer] = 61;
    }
    elseif ($score[$activeplayer] >= 49) {
      $score[$activeplayer] = 55;
    }
    elseif ($score[$activeplayer] >= 43) {
      $score[$activeplayer] = 49;
    }
    elseif ($score[$activeplayer] >= 36) {
      $score[$activeplayer] = 43;
    }
    elseif ($score[$activeplayer] >= 30) {
      $score[$activeplayer] = 36;
    }
    elseif ($score[$activeplayer] >= 24) {
      $score[$activeplayer] = 30;
    }
    elseif ($score[$activeplayer] >= 17) {
      $score[$activeplayer] = 24;
    }
    elseif ($score[$activeplayer] >= 11) {
      $score[$activeplayer] = 17;
    }
    elseif ($score[$activeplayer] >= 4) {
      $score[$activeplayer] = 11;
    }
    elseif ($score[$activeplayer] <= 0) {
      $score[$activeplayer] = 4;
    }
  }
}

function incOrange() {
  global $deck, $turn, $score, $activeplayer;
  $times = $deck->cards[$turn]->double ? 2 : 1;
  for ($loop = 1; $loop <= $times; $loop++) {
    if ($score[$activeplayer] >= 131) {
      $score[$activeplayer] = 134;
    }
    elseif ($score[$activeplayer] >= 125) {
      $score[$activeplayer] = 131;
    }
    elseif ($score[$activeplayer] >= 119) {
      $score[$activeplayer] = 125;
    }
    elseif ($score[$activeplayer] >= 113) {
      $score[$activeplayer] = 119;
    }
    elseif ($score[$activeplayer] >= 107) {
      $score[$activeplayer] = 113;
    }
    elseif ($score[$activeplayer] >= 100) {
      $score[$activeplayer] = 107;
    }
    elseif ($score[$activeplayer] >= 94) {
      $score[$activeplayer] = 100;
    }
    elseif ($score[$activeplayer] >= 87) {
      $score[$activeplayer] = 94;
    }
    elseif ($score[$activeplayer] >= 81) {
      $score[$activeplayer] = 87;
    }
    elseif ($score[$activeplayer] >= 75) {
      $score[$activeplayer] = 81;
    }
    elseif ($score[$activeplayer] >= 68) {
      $score[$activeplayer] = 75;
    }
    elseif ($score[$activeplayer] >= 62) {
      $score[$activeplayer] = 68;
    }
    elseif ($score[$activeplayer] >= 56) {
      $score[$activeplayer] = 62;
    }
    elseif ($score[$activeplayer] >= 50) {
      $score[$activeplayer] = 56;
    }
    elseif ($score[$activeplayer] >= 44) {
      $score[$activeplayer] = 50;
    }
    elseif ($score[$activeplayer] >= 37) {
      $score[$activeplayer] = 44;
    }
    elseif ($score[$activeplayer] >= 31) {
      $score[$activeplayer] = 37;
    }
    elseif ($score[$activeplayer] >= 25) {
      $score[$activeplayer] = 31;
    }
    elseif ($score[$activeplayer] >= 18) {
      $score[$activeplayer] = 25;
    }
    elseif ($score[$activeplayer] >= 12) {
      $score[$activeplayer] = 18;
    }
    elseif ($score[$activeplayer] >= 5) {
      $score[$activeplayer] = 12;
    }
    elseif ($score[$activeplayer] <= 0) {
      $score[$activeplayer] = 5;
    }
  }
}

function incGreen() {
  global $deck, $turn, $score, $activeplayer;
  $times = $deck->cards[$turn]->double ? 2 : 1;
  for ($loop = 1; $loop <= $times; $loop++) {
    if ($score[$activeplayer] >= 132) {
      $score[$activeplayer] = 134;
    }
    elseif ($score[$activeplayer] >= 126) {
      $score[$activeplayer] = 132;
    }
    elseif ($score[$activeplayer] >= 120) {
      $score[$activeplayer] = 126;
    }
    elseif ($score[$activeplayer] >= 114) {
      $score[$activeplayer] = 120;
    }
    elseif ($score[$activeplayer] >= 108) {
      $score[$activeplayer] = 114;
    }
    elseif ($score[$activeplayer] >= 101) {
      $score[$activeplayer] = 108;
    }
    elseif ($score[$activeplayer] >= 95) {
      $score[$activeplayer] = 101;
    }
    elseif ($score[$activeplayer] >= 88) {
      $score[$activeplayer] = 95;
    }
    elseif ($score[$activeplayer] >= 82) {
      $score[$activeplayer] = 88;
    }
    elseif ($score[$activeplayer] >= 76) {
      $score[$activeplayer] = 82;
    }
    elseif ($score[$activeplayer] >= 70) {
      $score[$activeplayer] = 76;
    }
    elseif ($score[$activeplayer] >= 63) {
      $score[$activeplayer] = 70;
    }
    elseif ($score[$activeplayer] >= 57) {
      $score[$activeplayer] = 63;
    }
    elseif ($score[$activeplayer] >= 51) {
      $score[$activeplayer] = 57;
    }
    elseif ($score[$activeplayer] >= 45) {
      $score[$activeplayer] = 51;
    }
    elseif ($score[$activeplayer] >= 38) {
      $score[$activeplayer] = 45;
    }
    elseif ($score[$activeplayer] >= 32) {
      $score[$activeplayer] = 38;
    }
    elseif ($score[$activeplayer] >= 26) {
      $score[$activeplayer] = 32;
    }
    elseif ($score[$activeplayer] >= 19) {
      $score[$activeplayer] = 26;
    }
    elseif ($score[$activeplayer] >= 13) {
      $score[$activeplayer] = 19;
    }
    elseif ($score[$activeplayer] >= 6) {
      $score[$activeplayer] = 13;
    }
    elseif ($score[$activeplayer] <= 0) {
      $score[$activeplayer] = 6;
    }
  }
}

function doCard() {
  global $deck, $turn, $score, $activeplayer;
  switch ($deck->cards[$turn]->type) {
    case 'red' :
      incRed();
      break;
    case 'purple' :
      incPurple();
      break;
    case 'yellow' :
      incYellow();
      break;
    case 'blue' :
      incBlue();
      break;
    case 'orange' :
      incOrange();
      break;
    case 'green' :
      incGreen();
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
  global $players, $activeplayer, $deck, $turn, $score, $licorice, $turnno;
  echo 'Turn #' . $turnno . ': ' . $players[$activeplayer]->name . ' drew ';
  echo $deck->cards[$turn]->double ? 'double ' : '';
  echo $deck->cards[$turn]->type . '. Moved to square ' . $score[$activeplayer] . '<br/>';
  if ($licorice[$activeplayer] == 'stuck') {
    echo 'STUCK IN LICORICE SWAMP, LOSE NEXT TURN<br/>';
  }
}

function checkBoard() {
  global $score, $activeplayer, $licorice, $output;
  if ($score[$activeplayer] == 46) {
    $licorice[$activeplayer] = 'stuck';
  }
  if ($score[$activeplayer] == 86) {
    $licorice[$activeplayer] = 'stuck';
  }
  if ($score[$activeplayer] == 117) {
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
  for ($turn = 0; $turn < 100; $turn++) {
    if ($turn >= 66) {
      $deck->shuffle();
      $turn = 0;
    }
    $turnno++;
    if ($licorice[$activeplayer] == 'stuck') {
      $licorice[$activeplayer] = 'unstuck';
      if ($output == 'true') {
        echo 'Turn #' . $turnno . ' ' . $players[$activeplayer]->name . ' is stuck in the swamp &nbsp; &nbsp; <br>';
      }
      if ($activeplayer >= 3) {
        $activeplayer = 0;
      }
      else {
        $activeplayer++;
      }
      $turn--;
      continue;
    };
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
      echo 'Congratulations ' . $players[$activeplayer]->name . ' You won in ' . $turnno . ' turns!';
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
