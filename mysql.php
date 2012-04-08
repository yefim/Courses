<?php
  $con = mysql_connect("localhost","root","cis330");
  if (!$con)
    die('Could not connect: ' + mysql_error());
  mysql_select_db('kingscourses',$con);
?>
