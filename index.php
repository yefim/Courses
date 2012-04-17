<?php include('header.php'); ?>
<?php
  if(!isset($_SESSION['userID'])) {
    header('Location: login.php');
    die();
  }
?>
<div class='span6'>
  <h2>Ingredients you own</h2>
  <table class='table' id='ingredients_table'>
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

<div class='span6'>
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
