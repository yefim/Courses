<?php include('header.php');
$instructions = mysql_query("SELECT instructions FROM recipe WHERE recipeid =" .  $_GET['recipeid']);
$ingredients = mysql_query("SELECT i.name FROM ingredients i, usedin u WHERE u.recipeid =" . $_GET['recipeid'] . " AND i.ingredientid = u.ingredientid");
echo 'Ingredients: <br />';
	while($row = mysql_fetch_array($ingredients)) {
		echo $row['name'] . '<br />';
	}
	echo '<br />';
	$row2 = mysql_fetch_array($instructions);
	echo $row2['instructions'];
include('footer.php'); ?>