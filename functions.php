<?php

function create_header($title) {
  echo "<div class='header'><h1>$title <small class='small'>Welcome, ".$_SESSION['first']."!</small></h1></div>";
}
function success($msg) {
  echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>x</a><h4 class='alert-heading'>Success!</h4>$msg</div>";
}
function warning($msg) {
  echo "<div class='alert'><a class='close' data-dismiss='alert'>x</a><h4 class='alert-heading'>Warning!</h4>$msg</div>";
}
function error($msg) {
  echo "<div class='alert alert-error'><a class='close' data-dismiss='alert'>x</a><h4 class='alert-heading'>Error!</h4>$msg</div>";
}
?>
