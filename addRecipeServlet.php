<?php include('header.php'); ?>

<?php
	$recipeName = $_POST["recipeName"];
	$instructions = $_POST["instructions"];
	$prepTime = $_POST["prepTime"];
	$cookTime = $_POST["cookTime"];
	//$recipeID = 
	$dishID = $_POST["dishID"];
	
	mysql_query("INSERT INTO recipes
	(RECIPEID, NAME, INSTRUCTIONS, PREPTIME, COOKTIME, DISHID) VALUES
	($recipeID, $recipeName, $instructions, $prepTime, $cookTime, $dishID)";
		
?>