<?php include('header.php'); ?>
<?php create_header('List Meals'); ?>
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
    //success("Your meal ($name) has been created.");
    success("Your meal ($name) has been created.");
    $hilight = $name;
  }
  if(isset($_GET['name'])) {
    $hilight = $_GET['name'];
    success("Your meal ($hilight) has been created.");
  }
?>
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
      <?php if ($hilight == $row['name']) { ?>
      <tr class='meals hilight' id='<?php echo $row['mealid']; ?>'>
      <?php } else { ?>
      <tr class='meals' id='<?php echo $row['mealid']; ?>'>
      <?php } ?>
        <td class='name'><? echo $row['name']; ?></td>
        <?php if($row['creator'] == $_SESSION['userID']) { ?> 
          <td class='creator'><? echo 'You ('.$row['firstname'].')'; ?></td>
          <td class='madeon'><? echo date('F j, Y', strtotime($row['madeon'])); ?></td>
          <td><button class='btn btn-danger' onclick='removeMeal(this);'>Remove</button></td>
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
      <tr class='even'>
        <td colspan="5">
				<?php
		    $mealid = $row['mealid'];
				$q1 = "SELECT r.name, d.categoryid FROM mealhasrecipes AS mr, recipe as r, dish as d WHERE mr.mealid = $mealid and mr.recipeid = r.recipeid and r.dishid = d.dishid";
				$q2 = "SELECT d.name FROM mealhasdrinks as mr, drink as d WHERE mr.mealid = $mealid and mr.drinkid = d.drinkid";
				$recipes = mysql_query($q1);
				$drinks = mysql_query($q2);
				$appetizers = array();
				$entrees = array();
				$desserts = array();
				while($row1 = mysql_fetch_array($recipes)) {
				  if($row1['categoryid'] == 0) {
					  $appetizers[] = $row1['name'];
          } elseif($row1['categoryid'] == 1) {
						$entrees[] = $row1['name'];
          } else {
            $desserts[] = $row1['name'];
          }
				}
        while($row2 = mysql_fetch_array($drinks)) {
          $drink[] = $row2['name'];
        }
				?>
				<h4>Appetizers: <small><?php echo count($appetizers); ?> appetizers</small></h4>
				<?php if(empty($appetizers)) {?>
				  <p><small>Nothing here.</small></p>
				<?php }  else { foreach($appetizers as $key=>$value) {?>
				  <p><?php echo ($key+1).". $value"; ?></p>
				<?php } } ?>
				<h4>Main Courses: <small><?php echo count($entrees); ?> entrees</small></h4>
				<?php if(empty($entrees)) {?>
					<p><small>Nothing here.</small></p>
				<?php } else { foreach($entrees as $key=>$value) {?>
					<p><?php echo ($key+1).". $value"; ?></p>
				<?php } } ?>
        <h4>Desserts: <small><?php echo count($desserts); ?> desserts</small></h4>
				<?php if(empty($desserts)) {?>
					<p><small>Nothing here.</small></p>
				<?php }  else { foreach($desserts as $key=>$value) {?>
					<p><?php echo ($key+1).". $value"; ?></p>
				<?php } } ?>
				<h4>Drinks: <small><?php echo count($drink); ?> drinks</small></h4>
				<?php if(empty($drink)) {?>
					<p><small>Nothing here.</small></p>
				<?php }  else { foreach($drink as $key=>$value) {?>
				  <p><?php echo ($key+1).". $value"; ?></p>
				<?php } } ?>
        </td>
      </tr>
    </tbody>
  <?php } ?>  
</table>
<?php include('footer.php') ?>
