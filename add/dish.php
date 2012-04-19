<?php include('../header.php'); ?>
<?php create_header('Your Kingdom'); ?>
<?php
  if(isset($_POST['name'])) {
    $dishname = $_POST['name'];
    $sql = "SHOW TABLE STATUS LIKE 'dish'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $next_id = $row['Auto_increment'];

    $contains = mysql_query("SELECT * FROM Dish WHERE name= $dishname");

    if($dishname != null && $contains == null) {
      mysql_query("INSERT INTO dish (name) VALUES ('$dishname')");
      //Problem if no cuisines are selected
      if (isset($_POST["cuisinechoice"])) {
        $cuisinelist = $_POST["cuisinechoice"];
        foreach ($cuisinelist as $value) {
          mysql_query("INSERT INTO dishtocuisine (dishid, cuisineid) VALUES ($next_id, $value)");
        }	
      } ?>
      <div class="alert alert-success">
        <a class="close" data-dismiss="alert">x</a>
        <h4 class="alert-heading">Success!</h4>
        Your dish has been added.
      </div>
    <?php } else if ($contains != null) { ?>
      <div class="alert">
        <a class="close" data-dismiss="alert">x</a>
        <h4 class="alert-heading">Warning!</h4>
        Dish already exists.
      </div>
    <?php } else { ?>
      <div class="alert alert-error">
        <a class="close" data-dismiss="alert">x</a>
        <h4 class="alert-heading">Error!</h4>
        Please provide a name for the dish.
      </div>
    <?php }
  }
  $q = "SELECT * FROM cuisine";
  $cuisines = mysql_query($q);
?>
<form action='dish.php' method='post' class='form-horizontal'>
  <div class='section-header'>
    <h2>Add a Dish<small>Create a new Category of Dishes</small></h2>
  </div>
  <div class='section-content'>
    <fieldset>
      <div class="control-group">
        <label for="dishname" class="control-label">Dish Name</label>
        <div class="controls">
          <input type="text" name='name' id="dishname" class="input-xlarge">
          <p class="help-block">Enter name of Dish</p>
        </div>
      </div>
      <div class='control-group'>
        <label for='cuisinetype' class='control-label'>Cuisine Type(s)</label>
        <div class='controls'>
          <select id='cuisinetype' class='chzn-select' name="cuisinechoice[]" multiple='multiple'>
  	        <?php while($row = mysql_fetch_array($cuisines)) { ?>
              <option id="<?php echo $row['cuisineid'];?>"><?php echo $row['name'];?></option>
            <?php } ?>
  	      </select>
          <p class='help-block'>Select cuisines that fit the dish</p>
        </div>
      </div>
    </fieldset>
  </div>
  <button onclick='addDish(this)' class='btn btn-primary'>Add this Dish</button>
</form>
<?php include('../footer.php'); ?>
