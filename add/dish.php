<?php
  include('../header.php');
	$q = "SELECT * FROM cuisine";
	$cuisines = mysql_query($q);
?>
<form action='addDish.php' method='post'>
<div class='section-header'>
  <h2>Add a Dish<small>Create a new Category of Dishes</small></h2>
</div>
<div class='section-content'>
  <div class="control-group">
    <label for="dishname" class="control-label">Dish Name</label>
    <div class="controls">
      <input type="text" name='dishName' id="dishname" class="input-xlarge">
      <p class="help-block">Enter name of Dish</p>
    </div>
  </div>
  <div class='control-group'>
    <label for='cuisinetype' class='control-label'>Cuisine Type(s)<label>
    <div class='controls'>
      <select name="cuisinechoice[]" class="chzn-select" multiple tabindex="4">
	      <?php while($row = mysql_fetch_array($cuisines)) { ?>
          <option id="<?php echo $row['cuisineid'];?>"><?php echo $row['name'];?></option>
        <?php } ?>
	    </select>
      <p class='help-block'>Select the cuisines that fit the dish</p>
    </div>
  </div>
</div>
<button onclick='addDish(this)' class='btn btn-primary'>Add this Dish</button>
</form>
<?php include('../footer.php'); ?>
