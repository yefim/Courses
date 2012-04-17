<?php include('header.php'); ?>
<?php
  if(!isset($_SESSION['userID'])) {
    header('Location: login.php');
    die();
  }
?>
<div class='span6'>
  <h2>Recipes you made</h2>
  <table class='table' id='ingredients_table'>
    <thead>
      <tr>
        <th>Name</th>
        <th class='action'></th>
      </tr>
    </thead>
    <tbody>
  <?php
  $q = "SELECT r.recipeid as id, r.name FROM recipe r WHERE creator=" . $_SESSION['userID'];
  echo $q;
  $recipes = mysql_query($q);
  while($row = mysql_fetch_array($recipes)) {
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


<?php include('footer.php'); ?>