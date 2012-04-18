<?php include('header.php'); ?>

<?php
	$cuisines = mysql_query("SELECT * FROM Cuisine ORDER BY Cuisine.name");
?>

<h1> Browse by Cuisine:</h1>
<br>
<form name="browseByCuisine" action="browseByCuisineServlet.php" method="post">

	<select name="cuisineID" data-placeholder="Choose a cuisine" class="chzn-select" style="width:350px;" tabindex="2">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($cuisines)) {
	?>
		<option value="<?php echo $row['cuisineid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
	</select><br><br>

	<input type="submit" value="Search">
	
</form>


<?php include('footer.php'); ?>
