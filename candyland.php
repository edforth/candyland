<?php

require 'autoload.php';

function render($message) {
  $html = FALSE;
  if ($html) {
    echo '<p>' . $message . '</p>';
  }
  else {
    echo "$message\n";
  }
}

$game = new \Forthplace\Candyland\Game();
$game->play();
