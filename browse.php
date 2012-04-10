<?php include('header.php'); ?>
<div>
  <h2>Meals</h2>
  <table class='table' id='meals_table'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Creator</th>
        <th>Made On</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $q = "SELECT * FROM meal";
    //echo $q;
    $meals = mysql_query($q);
    while($row = mysql_fetch_array($meals)) {
    ?>
      <tr class='meals' id='<?php echo $row['mealid']; ?>'>
        <td class='name'><? echo $row['name']; ?></td>
        <td class='creator'><? echo $row['creator']; ?></td>
        <td class='madeon'><? echo $row['madeon']; ?></td>
        <td><button class='btn btn-primary' onclick='likeItem(this);'>Like</button></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php include('footer.php'); ?>
