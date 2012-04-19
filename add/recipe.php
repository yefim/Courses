<?php include('../header.php'); ?>
<?php create_header('Your Kingdom'); ?>
<?php
	$dishes = mysql_query("SELECT * FROM dish ORDER BY name");
	$ingredients = mysql_query("SELECT * FROM ingredients ORDER BY name");
?>
<form action='recipe.php' method='post' class='form-horizontal'>
  <div class='section-header'>
    <h2>Add a Recipe<small>Design your own Recipe</small></h2>
  </div>
  <div class='section-content'>
    <fieldset>
      <div class="control-group">
        <label for="recipename" class="control-label">Recipe Name</label>
        <div class="controls">
          <input type="text" name='name' id="recipename" class="input-xlarge"/>
          <p class="help-block">Enter name of Recipe</p>
        </div>
      </div>
      <div class='control-group'>
        <label for='ingredients' class='control-label'>Ingredients</label>
        <div class='controls'>
          <select id='ingredients' multiple='multiple' class='chzn-select' name="ingredients[]">
          	<?php while($row = mysql_fetch_array($ingredients)) { ?>
          		<option value="<?php echo $row['ingredientid'];?>"><?php echo $row['name'];?></option>
          	<?php } ?>
  	      </select>
          <p class='help-block'>Select Ingredients</p>
        </div>
      </div>
      <div class="control-group">
        <label for="instructions" class="control-label">Instructions</label>
        <div class="controls">
          <textarea name='instructions' id="instructions" class='input-xlarge'></textarea>
          <p class="help-block">Enter Instructions for Recipe</p>
        </div>
      </div>
      <div class="control-group">
        <label for="preptime" class="control-label">Prep Time</label>
        <div class="controls">
          <input type='number' placeholder='In hours...' step='0.5' min='0.5' name='prepTime' id="preptime" class='input-small'/>
          <p class="help-block">Round to the nearest half hour</p>
        </div>
      </div>
      <div class="control-group">
        <label for="cooktime" class="control-label">Cook Time</label>
        <div class="controls">
          <input type='number' placeholder='In hours...' step='0.5' min='0.5' name='cookTime' id="cooktime" class='input-small'/>
          <p class="help-block">Round to the nearest half hour</p>
        </div>
      </div>
      <div class='control-group'>
        <label for='dishname' class='control-label'>Dish</label>
        <div class='controls'>
          <select id='dishname' class='chzn-select' name="dishID">
          	<?php while($row = mysql_fetch_array($dishes)) { ?>
          		<option value="<?php echo $row['dishid'];?>"><?php echo $row['name'];?></option>
          	<?php } ?>
  	      </select>
          <p class='help-block'>Select the type of Dish the Recipe is</p>
        </div>
      </div>
    </fieldset>
  </div>
  <button class='btn btn-primary'>Add Recipe</button>
</form>
<?php include('../footer.php'); ?>
