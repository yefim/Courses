<?php include('header.php'); ?>

<?php
	$cuisineID = $_POST["cuisineID"];		
	$sum = mysql_query("SELECT COUNT(*) AS sum FROM recipe r, dish d WHERE r.dishid=d.dishid AND r.dishid IN (SELECT dc.dishid FROM dishtocuisine dc WHERE dc.cuisineid=" . $cuisineID . ") ORDER BY d.name");
	$rowsum = mysql_fetch_array($sum);
?>
<div class='span12'>
  <h2><?php echo $rowsum['sum']; ?> Recipe(s) Found By Cuisine</h2>
  <table class='table' id='recipe_table'>
    <thead>
      <tr>
        <th>Name</th>
		<th>Prep Time</th>
		<th>Cook Time</th>
		<th>Instructions</th>
		<th>Dish</th>
      </tr>
    </thead>
    <tbody>
  <?php
  $q = "SELECT r.recipeid as id, r.name, r.prepTime, r.cookTime, r.instructions, d.name as dname FROM recipe r, dish d WHERE r.dishid=d.dishid AND r.dishid IN (SELECT dc.dishid FROM dishtocuisine dc WHERE dc.cuisineid=" . $cuisineID . ") ORDER BY d.name";
  $recipes = mysql_query($q);
  while($row = mysql_fetch_array($recipes)) {
  ?>
    <tr class='recipe'>
      <td class='name'><?php echo $row['name']; ?></td>
      <td class='prep'><?php echo $row['prepTime']; ?></td>
      <td class='cook'><?php echo $row['cookTime']; ?></td>
      <td class='insn'><?php echo $row['instructions']; ?></td>
	  <td class='insn'><?php echo $row['dname']; ?></td>
    </tr>
  <?php
  }
  ?>
    </tbody>
  </table>
</div>

<?php include('footer.php'); ?>