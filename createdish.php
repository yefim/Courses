<?php include('header.php'); ?>

<?php 
	$q = "SELECT * FROM CUISINE";
	$cuisines = mysql_query($q);

?>


<h2> Add a Dish:</h2> 
<br/>
  <table class='table'>
    <thead>
      <tr>
		<th>Dish Name</th>
	  </tr>
    </thead>
   </table>
	
<form name="addDish" action="addDish.php" method="post">
	<input name="dishName" type=text size="50" maxlength="100"><br><br>
	
	  <table class='table'>
    <thead>
      <tr>
		<th>Cuisine Type(s):</th>
	  </tr>
    </thead>
   </table>
	
	<select name="cuisinechoice[]" data-placeholder="Choose Cuisine Type(s)" class="chzn-select" multiple style="width:350px;" tabindex="4">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($cuisines)) {
	?>
		<option value="<?php echo $row['cuisineid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
	</select>
	<div id='buttons'>
  <button class='btn btn-primary'>Add this Dish</button>
</div>
</form>
</div>