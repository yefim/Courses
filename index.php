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
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
  $q = "SELECT i.ingredientid as id, name, quantity FROM ingredients i, userhas h WHERE i.ingredientid=h.ingredientid AND FBid=" . $_SESSION['userID'];
  //echo $q;
  $ingredients = mysql_query($q);
  while($row = mysql_fetch_array($ingredients)) {
  ?>
    <tr class='ingredient' id='<?php echo $row['id']; ?>'>
      <td class='name'><? echo $row['name']; ?></td>
      <td class='quantity'><? echo $row['quantity']; ?></td>
      <td><button class='btn btn-danger' onclick='removeItem(this);'>Remove</button></td>
    </tr>
  <?php } ?>
    <tr class='item-row'>
      <td>
        <input id='ingredients' type='text' />
          <?php
          $q = "SELECT * FROM ingredients WHERE ingredientid NOT IN (SELECT i.ingredientid FROM ingredients i, userhas h WHERE i.ingredientid=h.ingredientid AND FBid=".$_SESSION['userID'].")";
          //echo $q;
          $list = mysql_query($q);
          while ($row = mysql_fetch_array($list)) {
          ?>
           <!--<option id='<?php echo $row['ingredientid']; ?>'><?php echo $row['name']; ?></option>-->
          <?php } ?>
      </td>
      <td>
        <input id ='quantity' class='input-small' type='number' min='1'/>
      </td>
      <td><button id ='add' class='btn' onclick='addItem(this);'>Add</button></td>
    </tr>
    </tbody>
  </table>
</div>

<div id='likes' class='span6'>
  <h2>Meals you like</h2>
  <h4>You have not liked any meals yet.</h4>
</div>

<?php include('footer.php'); ?>
