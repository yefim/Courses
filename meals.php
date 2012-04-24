<?php
  session_start();
  include('mysql.php');

  $method = $_GET['method'];
  $mealid = $_GET['id'];
  $id = $_SESSION['userID'];
  switch($method) {
    case "like":
      $q = "INSERT INTO likes(fbid,mealid)values($id,$mealid)";
      break;
    case "unlike":
      $q = "DELETE FROM likes WHERE fbid=$id AND mealid=$mealid";
      break;
    case "delete":
      mysql_query("DELETE FROM mealhasrecipes WHERE mealid=$mealid");
      mysql_query("DELETE FROM mealhasdrinks WHERE mealid=$mealid");
      $q = "DELETE FROM meal WHERE mealid=$mealid";
  }
  mysql_query($q);
  echo $q;
  mysql_close($con)
?>
