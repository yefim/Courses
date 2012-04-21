<?php include('header.php'); ?>

<?php
	$dietID = $_POST["dietID"];	
	$sum = mysql_query("SELECT COUNT(*) AS sum FROM recipe r WHERE r.recipeid NOT IN (SELECT DISTINCT u.recipeid FROM usedin u WHERE u.ingredientid IN (SELECT DISTINCT rd.ingredientid FROM restricted rd WHERE rd.dietid=" . $dietID . ")) ORDER BY r.name");
	$rowsum = mysql_fetch_array($sum);
?>
<div class='span12'>
  <h2><?php echo $rowsum['sum']; ?> Recipe(s) Found By Diet</h2>
  <table class='table' id='recipe_table'>
    <thead>
      <tr>
        <th>Name</th>
		<th>Prep Time</th>
		<th>Cook Time</th>
		<th>Instructions</th>
      </tr>
    </thead>
    <tbody>
  <?php
  $q = "SELECT r.recipeid as id, r.name, r.prepTime, r.cookTime, r.instructions " . 
	   "FROM recipe r " . // returns all recipeids that are not in the below
	   "WHERE r.recipeid NOT IN " .
			"(SELECT DISTINCT u.recipeid " .
			"FROM usedin u " . // returns all recipeids in usedin that correspond to ingredients from diet
			"WHERE u.ingredientid IN " .
				"(SELECT DISTINCT rd.ingredientid " .
				"FROM restricted rd " . // returns all ingredients from diet
				"WHERE rd.dietid=" . $dietID . ")" .
			")" .
	   "ORDER BY r.name";
  $recipes = mysql_query($q);
  while($row = mysql_fetch_array($recipes)) {
  ?>
    <tr class='recipe'>
      <td class='name'><?php echo $row['name']; ?></td>
      <td class='prep'><?php echo $row['prepTime']; ?></td>
      <td class='cook'><?php echo $row['cookTime']; ?></td>
      <td class='insn'><?php echo $row['instructions']; ?></td>
    </tr>
  <?php
  }
  ?>
    </tbody>
  </table>
</div>

<?php include('footer.php'); ?>