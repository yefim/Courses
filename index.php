<?php include('header.php'); ?>
<?php
  if(!isset($_SESSION['userID'])) {
    header('Location: login.php');
    die();
  }
?>
<?php create_header('Your Kingdom'); ?>
<div class='index-column span6'>
  <h2>Recipes you've made</h2>
  <table class='table' id='recipe_table'>
    <thead>
      <tr>
        <th>Name</th>
        <th># of Ingredients</th>
        <th class='action'></th>
      </tr>
    </thead>
    <tbody>
  <?php
  $q = "SELECT r.recipeid as id, r.name, r.prepTime, r.cookTime, r.instructions FROM recipe r WHERE creator=" . $_SESSION['userID'];
  $recipes = mysql_query($q);
  while($row = mysql_fetch_array($recipes)) {
  ?>
    <tr class='recipe'>
      <td class='name'><?php echo $row['name']; ?></td>
      <td class='prep'><?php echo $row['prepTime']; ?></td>
      <td class='cook'><?php echo $row['cookTime']; ?></td>
      <td class='insn'><?php echo $row['instructions']; ?></td>
	  <td><form name="editRecipe" action="editRecipes.php" method="post"><input name="recipeID" type="hidden" value="<?php echo $row['id'] ?>"><button class='btn' onclick(submit)>Edit</button></form></td>
    </tr>
  <?php
  }
  ?>
    </tbody>
  </table>
</div>

<div class='span6 index-column'>
  <h2>Ingredients you own</h2>
  <table class='table table-condensed' id='ingredients_table'>
    <thead>
      <tr>
        <th>Name</th>
        <th class='action'></th>
      </tr>
    </thead>
    <tbody>
  <?php
  $q = "SELECT i.ingredientid as id, i.name FROM ingredients i, userhas h WHERE i.ingredientid=h.ingredientid AND FBid=" . $_SESSION['userID'];
  //echo $q;
  $ingredients = mysql_query($q);
  while($row = mysql_fetch_array($ingredients)) {
  ?>
    <tr class='ingredient'>
      <td class='name'><?php echo $row['name']; ?></td>
      <td><button class='btn btn-danger' onclick='removeItem(this);'>Remove</button></td>
    </tr>
  <?php } ?>
    <tr class='item-row'>
      <td>
        <input id='ingredients' type='text' />
        <?php
          $q = "SELECT * FROM ingredients WHERE ingredientid NOT IN (SELECT i.ingredientid FROM ingredients i, userhas h WHERE i.ingredientid=h.ingredientid AND FBid=".$_SESSION['userID'].")";
          //echo $q;
          $source = array();
          $list = mysql_query($q);
        ?>
        <script type='text/javascript'>
          var source = [];
          <?php while ($row = mysql_fetch_array($list)) { ?>
            source.push(<?php echo '"'.$row['name'].'"'; ?>);
          <?php } ?>
          $('#ingredients').typeahead({
            source: source,
            items:8
          });
        </script>
      </td>
      <td><button id ='add' class='btn' onclick='addItem(this);'>Add</button></td>
    </tr>
    </tbody>
  </table>
</div>

<div class='index-column'>
  <h2>Meals you like</h2>
  <?php
    $q = "SELECT DISTINCT likes.mealid, meal.name, users.firstname FROM likes, meal,users WHERE likes.fbid=".$_SESSION['userID']." AND likes.mealid=meal.mealid AND users.fbid=meal.creator";
    $meals = mysql_query($q);
    if (mysql_num_rows($meals) == 0) { ?>
      <h4>You have not liked any meals yet.</h4>
    <?php } else { ?>
      <table class='table' id='meals_table'>
        <thead>
          <tr>
            <th>Name</th>
            <th>Creator</th>
            <th class='action'></th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysql_fetch_array($meals)) { ?>
            <tr class='meal' id='<?php echo $row['mealid']; ?>'>
              <td class='meal_name'><? echo $row['name']; ?></td>
              <td class='creator'><? echo $row['firstname']; ?></td>
              <td><button class='btn btn-info' onclick='unlikeMeal(this);'>Unlike</button></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
</div>

<?php include('footer.php'); ?>
