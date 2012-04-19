<?php

function create_header($title) {
  echo "<div class='header'><h1>$title <small class='small'>Welcome, ".$_SESSION['first']."!</small></h1></div>";
}
?>
