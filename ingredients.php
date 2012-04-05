<?php
  session_start();
  include('mysql.php');

  $method = $_GET['method'];
  $id = $_SESSION['userID'];
  switch($method) {
    case "delete":
      $q = "DELETE FROM UserHas WHERE FBid=".$id." AND ingredientID='".$_GET['id']."'";
      break;
    case "insert":
      $q = "INSERT INTO UserHas(FBid, ingredientID, quantity) VALUES(".$id.", ".$_GET['id'].", ".$_GET['quantity'].")";
      break;
    case "update":
      $q = "UPDATE UserHas SET quantity=".$_GET['quantity']." WHERE FBid=".$id." AND ingredientID='".$_GET['id']."'";
      break;
  }
  mysql_query($q);

  mysql_close($con)
?>
