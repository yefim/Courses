<?php
session_start();
include('../mysql.php');

$recipeid = $_GET['recipeid'];
$ingredients = mysql_query("SELECT usedin.ingredientid, name FROM usedin, ingredients WHERE usedin.ingredientid=ingredients.ingredientid AND recipeid=$recipeid");
$rows = array();
while ($row = mysql_fetch_array($ingredients)) {
  $rows[] = $row;
}
print json_encode($rows);
?>
