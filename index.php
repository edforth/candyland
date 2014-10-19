<?php

require 'autoload.php';

/**
 * Simple renderer.
 *
 * @param string $message
 *   The message to be rendered.
 */
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
