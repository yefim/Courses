<?php include('header.php'); ?>

<?php
	$dishID = $_POST["dishID"];		
	$sum = mysql_query("SELECT COUNT(*) AS sum FROM recipe r WHERE r.dishid=" . $dishID . " ORDER BY r.name");
	$rowsum = mysql_fetch_array($sum);
?>
<div class='span12'>
  <h2><?php echo $rowsum['sum']; ?> Recipe(s) Found By Dish</h2>
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
  $q = "SELECT r.recipeid as id, r.name, r.prepTime, r.cookTime, r.instructions FROM recipe r WHERE r.dishid=" . $dishID . " ORDER BY r.name";
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