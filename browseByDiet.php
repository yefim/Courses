<?php include('header.php'); ?>

<?php
	$diets = mysql_query("SELECT * FROM Diet ORDER BY Diet.name");
?>

<h1> Browse by Diet:</h1>
<br>
<form name="browseByDiet" action="browseByDietServlet.php" method="post">

	<select name="dietID" data-placeholder="Choose a diet" class="chzn-select" style="width:350px;" tabindex="2">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($diets)) {
	?>
		<option value="<?php echo $row['dietid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
	</select><br><br>

	<input type="submit" value="Search">
	
</form>


<?php include('footer.php'); ?>
