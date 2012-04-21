<?php include('header.php'); ?>
<?php create_header('List Meals'); ?>
<div>
  <h2>Meals</h2>
  <table class='table' id='meals_table'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Creator</th>
        <th>Made On</th>
        <th class='action'></th>
      </tr>
    </thead>
    <tbody>
    <?php
    $q = "SELECT creator, mealid, name, firstname, madeon FROM meal NATURAL JOIN users where meal.creator=users.fbid ORDER BY name";
    //echo $q;
    $meals = mysql_query($q);
    while($row = mysql_fetch_array($meals)) {
    ?>
      <tr class='meals' id='<?php echo $row['mealid']; ?>'>
        <td class='name'><? echo $row['name']; ?></td>
        <?php if($row['creator'] == $_SESSION['userID']) { ?> 
          <td class='creator'><? echo 'You ('.$row['firstname'].')'; ?></td>
          <td class='madeon'><? echo date('F j, Y', strtotime($row['madeon'])); ?></td>
          <td><button class='btn' onclick='editMeal(this);'>Edit</button></td>
        <?php } else { ?>
          <td class='creator'><? echo $row['firstname']; ?></td>
          <td class='madeon'><? echo date('F j, Y', strtotime($row['madeon'])); ?></td>
          <?php
          $id = $_SESSION['userID'];
          $q = "SELECT COUNT(mealid) FROM likes WHERE fbid=$id AND mealid=". $row['mealid'];
          $liked = array_pop(mysql_fetch_array(mysql_query($q)));
          if ($liked == 0) {
          ?>
            <td><button class='btn btn-primary' onclick='likeMeal(this);'>Like</button></td>
          <?php } else { ?>
            <td><button class='btn btn-info' onclick='unlike(this);'>Unike</button></td>
          <?php } ?>
        <?php } ?>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php include('footer.php'); ?>
