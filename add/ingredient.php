<?php include('../header.php'); ?>

<?php 
	$q = "SELECT * FROM Diet ORDER BY name";
	$diets = mysql_query($q);

?>

<h2> Add an Ingredient:</h2> 
<br/>
  <table class='table'>
    <thead>
      <tr>
		<th>Ingredient Name</th>
	  </tr>
    </thead>
   </table>
	
<form name="addIngredient" action="addIngredient.php" method="post">
	<input name="ingredientName" type=text size="50" maxlength="300"><br><br>
	
	  <table class='table'>
    <thead>
      <tr>
		<th>Follows All Dietary Restrictions Except For:</th>
	  </tr>
    </thead>
   </table>
   
   	<select name="dietaryrestrictions[]" data-placeholder="Follows All Dietary Restrictions Except For:" class="chzn-select" multiple style="width:350px;" tabindex="4">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($diets)) {
	?>
		<option value="<?php echo $row['dietid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
	</select>
	<div id='buttons'>
  <button class='btn btn-primary'>Add this Ingredient</button>
</div>
</form>
</div>

<?php include('../footer.php'); ?>
