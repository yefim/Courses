<?php include('header.php'); ?>

<?php
	$recipeName = $_POST["recipeName"];
	$instructions = $_POST["instructions"];
	$prepTime = $_POST["prepTime"];
	$cookTime = $_POST["cookTime"];
	$recipeID = $_POST["recipeID"];
	//$dishID = $_POST["dishID"];
	$creator = $_SESSION['userID'];
	//$ingredients = $_POST["ingredients"];
	
	$q = "UPDATE recipe " .
		 "SET name=\"$recipeName\", instructions=\"$instructions\", prepTime=$prepTime, cookTime=$cookTime " .
		 "WHERE recipeid=$recipeID";
		 
	//echo $q;	 
	
	mysql_query($q);

		
?>

<!--?php header('Location: recipesMade.php');
REDIRECT HERE
DELETE HEADER AND FOOTER
?-->

<?php include('footer.php'); ?>