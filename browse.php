<?php include('header.php'); ?>
<div>
  <h2>Meals</h2>
  <table class='table' id='meals_table'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Creator</th>
        <th>Made On</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
    $q = "SELECT mealid, name, firstname, madeon FROM meal NATURAL JOIN users where meal.creator=users.fbid";
    //echo $q;
    $meals = mysql_query($q);
    while($row = mysql_fetch_array($meals)) {
    ?>
      <tr class='meals' id='<?php echo $row['mealid']; ?>'>
        <td class='name'><? echo $row['name']; ?></td>
        <td class='creator'><? echo $row['firstname']; ?></td>
        <td class='madeon'><? echo date('F j, Y', strtotime($row['madeon'])); ?></td>
        <td><button class='btn btn-primary' onclick='likeItem(this);'>Like</button></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php include('footer.php'); ?>
