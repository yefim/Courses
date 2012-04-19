<?php include('../header.php'); ?>

<?php
	$dishes = mysql_query("SELECT * FROM dish ORDER BY name");
	$ingredients = mysql_query("SELECT * FROM ingredients ORDER BY name");
?>

<h1> Add a Recipe:</h1>

<form name="addRecipe" action="addRecipeServlet.php" method="post">
	Recipe Name:
	<input name="recipeName" type=text size="50" maxlength="300"><br>
	Instructions:<br>
	<textarea name="instructions" cols="48" rows="4"></textarea><br> <!-- maxlength 4000 -->
	Prep Time:
	<input name="prepTime" type=text size="3" maxlength="3"><br> <!-- accept only ints -->
	Cook Time:
	<input name="cookTime" type=text size="3" maxlength="3"><br> <!-- accept only ints -->
	DishID:
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
	Ingredients Needed:
	<select name="ingredients[]" data-placeholder="Choose ingredients" class="chzn-select" multiple style="width:350px;" tabindex="4">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($ingredients)) {
	?>
		<option value="<?php echo $row['ingredientid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
	</select><br>
	<input type="submit" value="Add this Recipe"><br>

</form>

<?php include('../footer.php'); ?>
