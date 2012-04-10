<?php include('header.php'); ?>

<?php
	$recipeName = $_POST["recipeName"];
	$instructions = $_POST["instructions"];
	$prepTime = $_POST["prepTime"];
	$cookTime = $_POST["cookTime"];
	$result = mysql_query("SHOW TABLE STATUS LIKE 'recipe'");
	$row = mysql_fetch_array($result);
	$recipeID = $row['Auto_increment'];
	$dishID = $_POST["dishID"];
	
	mysql_query("INSERT INTO recipes
	(NAME, INSTRUCTIONS, PREPTIME, COOKTIME, DISHID) VALUES
	($recipeName, $instructions, $prepTime, $cookTime, $dishID)";
	
	// Input ingredients
	//   Add to usedin 
		
?>