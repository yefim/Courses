<?php include('header.php'); ?>

<?php
	$dishes = mysql_query("SELECT * FROM dish ORDER BY dish.name");
?>

<h1> Browse by Dish:</h1>
<br>
<form name="browseByDish" action="browseByDishServlet.php" method="post">

	<select name="dishID" data-placeholder="Choose a dish" class="chzn-select" style="width:350px;" tabindex="2">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($dishes)) {
	?>
		<option value="<?php echo $row['dishid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
	</select><br><br>

	<input class='btn' type="submit" value="Search">
	
</form>


<?php include('footer.php'); ?>
