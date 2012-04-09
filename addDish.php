<?php include('header.php'); ?>

<?php 
	$dishname = $_POST["dishName"];
	$sql = "SHOW TABLE STATUS LIKE 'dish'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$next_id = $row['Auto_increment'];
	
	$contains = mysql_query("SELECT * FROM Dish WHERE name= $dishname");
	 
	if($dishname != null && $contains == null) {
		mysql_query("INSERT INTO dish (name) VALUES ('$dishname')");
		//Problem if no cuisines are selected
		if (isset($_POST["cuisinechoice"])) {
			$cuisinelist = $_POST["cuisinechoice"];
			foreach ($cuisinelist as $value) {
				mysql_query("INSERT INTO dishtocuisine (dishid, cuisineid) VALUES ($next_id, $value)");
			}	
		}
		echo "Thank you!\n";
		
	}
	else if ($contains != null) {
		echo "Dish already exists.\n";
	}
	else {
		echo "Please provide a name for the dish.\n";
	}
	
	

?>