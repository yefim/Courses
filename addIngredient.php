<?php include('header.php'); ?>

<?php 
	$ingredientname = $_POST["ingredientName"];
	$sql = "SHOW TABLE STATUS LIKE 'ingredients'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$next_id = $row['Auto_increment'];
	
	$contains = mysql_query("SELECT * FROM ingredients WHERE name= $ingredientname");
	
	if($ingredientname != null && $contains == null) {
		mysql_query("INSERT INTO ingredients (name) VALUES ('$ingredientname')");
		//Tests whether or anything is selected for dietary restrictions
		if (isset($_POST["dietaryrestrictions"])) {
			$dietarylist = $_POST["dietaryrestrictions"];
			foreach ($dietarylist as $value) {
				mysql_query("INSERT INTO restricted (dietid, ingredientid) VALUES ($value, $next_id)");
			}
			}	
		echo "Thank you!\n";
		
	}
	else if ($contains != null) {
		echo "Ingredient already exists.\n";
	}
	else {
		echo "Please provide a name for the ingredient.\n";
	}
	
	

?>

<?php include('footer.php'); ?>