<?php include('header.php');?>
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
foreach ($recipe_ingredients as $recipe => $ingredients) {
  foreach($ingredients as $ingredient) {
    $r = array_pop(mysql_fetch_array(mysql_query("SELECT name FROM recipe WHERE recipeid=$recipe")));
    $i = array_pop(mysql_fetch_row(mysql_query("SELECT name FROM ingredients WHERE ingredientid=$ingredient")));
    echo "<br/>Key: $r; Value: $i";
  }
}


?>
<?php include('footer.php'); ?>
