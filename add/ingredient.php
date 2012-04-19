<?php include('../header.php'); ?>
<?php create_header('Your Kingdom'); ?>
<?php 
	$q = "SELECT * FROM diet ORDER BY name";
	$diets = mysql_query($q);

?>
<form action='ingredient.php' method='post' class='form-horizontal'>
  <div class='section-header'>
    <h2>Add an Ingredient<small>Create a new Ingredient</small></h2>
  </div>
  <div class='section-content'>
    <fieldset>
      <div class="control-group">
        <label for="ingredientname" class="control-label">Ingredient Name:</label>
        <div class="controls">
          <input type="text" name='name' id="ingredientname" class="input-xlarge">
          <p class="help-block">Enter name of Ingredient</p>
        </div>
      </div>
      <div class='control-group'>
        <label for='cuisinetype' class='control-label'>Does NOT Follow these Restrictions:</label>
        <div class='controls'>
          <select id='cuisinetype' class='chzn-select' name="cuisinechoice[]" multiple='multiple'>
  	        <?php while($row = mysql_fetch_array($diets)) { ?>
              <option id="<?php echo $row['dietid'];?>"><?php echo $row['name'];?></option>
            <?php } ?>
  	      </select>
          <p class='help-block'>Select which dietary restrictions it doesn't follow</p>
        </div>
      </div>
    </fieldset>
  </div>
  <button onclick='addDish(this)' class='btn btn-primary'>Add Ingredient</button>
</form>
<?php include('../footer.php'); ?>
