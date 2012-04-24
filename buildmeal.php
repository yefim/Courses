<?php include('header.php');?>
<?php create_header('Build a Meal'); ?>
<?php

  if(isset($_POST['name'])) {
    $id = $_SESSION['userID'];
    $name = $_POST['name'];
    $recipes = $_POST['recipes'];
    $sql = "SHOW TABLE STATUS LIKE 'meal'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $next_id = $row['Auto_increment'];
    
    mysql_query("INSERT INTO meal(name, creator) VALUES('$name','$id')");
    foreach($recipes as $r) {
      $query = "INSERT INTO mealhasrecipes(mealid, recipeid) VALUES ($next_id, $r)";
      mysql_query($query);
    }
    header("Location: list.php?name=$name");
    //success("Your meal ($name) has been created.");
  }

?>
<form action='list.php' class='form-horizontal' method='POST'>
  <div class='section-header'>
    <h2>Meal Details</h2>
  </div>
  <div class='section-content'>
    <fieldset>
      <div class="control-group">
        <label for="mealname" class="control-label">Meal Name</label>
        <div class="controls">
          <input required type="text" name='name' id="mealname" class="input-xlarge"/>
          <p class="help-block">Name your meal</p>
        </div>
      </div>
    </fieldset>
  </div>
  <div class='section-header'>
    <h2>Recommended Recipes<small>Based on the Ingredients you own</small></h2>
  </div>
  <div class='recipes' class='section-content'>
    <fieldset>
      <div class="control-group">
        <div class="controls">
          <?php
          $userid = $_SESSION['userID'];
          $recipes_with_at_least_one = mysql_query("SELECT DISTINCT recipeid FROM usedin WHERE ingredientid IN (SELECT ingredientid FROM userhas WHERE fbid=$userid)");
          $recipe_ingredients = array();
          while ($row = mysql_fetch_array($recipes_with_at_least_one)) {
            $recipeid = $row['recipeid'];
            $query = "SELECT DISTINCT ingredientid FROM (SELECT ingredientid FROM userhas WHERE fbid=$userid) h INNER JOIN (SELECT ingredientid FROM usedin WHERE recipeid=$recipeid) i USING (ingredientid)";
            $ingredients_in_recipe = mysql_query($query);
            $recipe_ingredients[$recipeid] = array();
            while ($i = mysql_fetch_array($ingredients_in_recipe)) {
              array_push($recipe_ingredients[$recipeid], $i['ingredientid']);
            }
          }
          //echo $query;
          //var_dump($recipe_ingredients);
          if (count($recipe_ingredients) == 0) {
            echo "<h4>Looks like you don't have any ingredients yet.</h4>";
          }
          foreach ($recipe_ingredients as $recipe => $ingredients) {
            if (count($ingredients) < 2) continue;
            $r = array_pop(mysql_fetch_array(mysql_query("SELECT name FROM recipe WHERE recipeid=$recipe")));
            $dishid = array_pop(mysql_fetch_array(mysql_query("SELECT dishid FROM recipe WHERE recipeid=$recipe")));
            $d = array_pop(mysql_fetch_array(mysql_query("SELECT name FROM dish WHERE dishid=$dishid")));
            $cat = array_pop(mysql_fetch_array(mysql_query("SELECT categoryname FROM category, dish WHERE dish.categoryid=category.categoryid AND dishid=$dishid")));
            $i = array();
            foreach($ingredients as $ingredient) {
              array_push($i, array_pop(mysql_fetch_row(mysql_query("SELECT name FROM ingredients WHERE ingredientid=$ingredient"))));
            } 
            echo "<div class='hover-info'>";
            echo "<label class='checkbox'><input name='recipes[]' value='$recipe' type='checkbox'/><h4>$r</h4></label>";
            echo "<p class='info'><span>";
            echo "Category: <em>$cat</em>, Dish: <em>$d</em>"; 
            echo "</span></p>";
            echo "<p class='help-block'>Based on <em>".implode(', ', $i)."</em></p>";
            echo "</div>";
          }
          ?>
        </div>
      </div>
    </fieldset>
  </div>
  <button class='btn btn-primary'>Build Meal</button>
</form>
<?php include('footer.php'); ?>
