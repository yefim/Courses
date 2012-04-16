<?php
  session_start();
  include('mysql.php');

  $method = $_GET['method'];
  $name = $_GET['ingredient'];
  $id = $_SESSION['userID'];
  $query = "SELECT ingredientid FROM ingredients WHERE name='$name' LIMIT 1";
  $ingredientid = array_pop(mysql_fetch_array(mysql_query($query)));
  switch($method) {
    case "delete":
      $q = "DELETE FROM userhas WHERE FBid=$id AND ingredientid=$ingredientid";
      break;
    case "insert":
      $q = "INSERT INTO userhas(FBid, ingredientid) VALUES($id, $ingredientid)";
      break;
  }
  mysql_query($q);
  echo $q;
  mysql_close($con)
?>
