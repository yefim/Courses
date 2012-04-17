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
	$ingredients = $_POST["ingredients"];
	
	mysql_query("INSERT INTO recipe " .
	"(name, instructions, preptime, cooktime, dishid) VALUES " .
	"('$recipeName', '$instructions', $prepTime, $cookTime, $dishID)");
	
	foreach ($ingredients as $value) {
		mysql_query("INSERT INTO usedin (RECIPEID, INGREDIENTID) " .
					"VALUES ($recipeID, $value)");
	}
	
	echo "Thank you!\n";
		
?>

<?php include('footer.php'); ?>