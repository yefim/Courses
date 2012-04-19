<?php include('../header.php'); ?>
<?php create_header('Your Kingdom'); ?>
<?php 
  if (isset($_POST['name'])) {
    $ingredientname = $_POST["name"];
    $sql = "SHOW TABLE STATUS LIKE 'ingredients'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $next_id = $row['Auto_increment'];
    $contains = mysql_query("SELECT * FROM ingredients WHERE name= $ingredientname");
    
    if($ingredientname != null && $contains == null) {
      mysql_query("INSERT INTO ingredients (name) VALUES ('$ingredientname')");
      if (isset($_POST["dietaryrestrictions"])) {
        $dietarylist = $_POST["dietaryrestrictions"];
        foreach ($dietarylist as $value) {
          mysql_query("INSERT INTO restricted (dietid, ingredientid) VALUES ($value, $next_id)");
        }
      } 
      success("Your ingredient ($ingredientname) has been added.");
    } else if ($contains != null) {
      warning("Ingredient ($ingredientname) already exists.");
    } else {
      error('Please provide a name for the ingredient.');
    }
  }
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
        <label for="ingredientname" class="control-label">Ingredient Name</label>
        <div class="controls">
          <input type="text" name='name' id="ingredientname" class="input-xlarge"/>
          <p class="help-block">Enter name of Ingredient</p>
        </div>
      </div>
      <div class='control-group'>
        <label for='cuisinetype' class='control-label'>Does NOT Follow</label>
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
  <button class='btn btn-primary'>Add Ingredient</button>
</form>
<?php include('../footer.php'); ?>
