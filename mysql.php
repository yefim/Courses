<?php
  include('config.php');
  $con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
  if (!$con)
    die('Could not connect: ' + mysql_error());
  mysql_select_db(DB_DATABASE,$con);
?>
