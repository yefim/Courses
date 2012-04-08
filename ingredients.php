<?php
  session_start();
  include('mysql.php');

  $method = $_GET['method'];
  $id = $_SESSION['userID'];
  switch($method) {
    case "delete":
      $q = "DELETE FROM userhas WHERE FBid=".$id." AND ingredientid='".$_GET['id']."'";
      break;
    case "insert":
      $q = "INSERT INTO userhas(FBid, ingredientid, quantity) VALUES(".$id.", ".$_GET['id'].", ".$_GET['quantity'].")";
      break;
    case "update":
      $q = "UPDATE userhas SET quantity=".$_GET['quantity']." WHERE FBid=".$id." AND ingredientid='".$_GET['id']."'";
      break;
  }
  mysql_query($q);

  mysql_close($con)
?>
