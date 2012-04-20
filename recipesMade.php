<?php include('header.php'); ?>
<?php
  if(!isset($_SESSION['userID'])) {
    header('Location: login.php');
    die();
  }
?>
<div class='span12'>
  <h2>Recipes you made</h2>
  <table class='table' id='recipe_table'>
    <thead>
      <tr>
        <th>Name</th>
		<th>Prep Time</th>
		<th>Cook Time</th>
		<th>Instructions</th>
        <th class='action'></th>
      </tr>
    </thead>
    <tbody>
  <?php
  $q = "SELECT r.recipeid as id, r.name, r.prepTime, r.cookTime, r.instructions FROM recipe r WHERE creator=" . $_SESSION['userID'];
  $recipes = mysql_query($q);
  while($row = mysql_fetch_array($recipes)) {
  ?>
    <tr class='recipe'>
      <td class='name'><?php echo $row['name']; ?></td>
      <td class='prep'><?php echo $row['prepTime']; ?></td>
      <td class='cook'><?php echo $row['cookTime']; ?></td>
      <td class='insn'><?php echo $row['instructions']; ?></td>
	  <td><form name="editRecipe" action="editRecipes.php" method="post"><input name="recipeID" type="hidden" value="<?php echo $row['id'] ?>"><button class='btn' onclick(submit)>Edit</button></form></td>
    </tr>
  <?php
  }
  ?>
    </tbody>
  </table>
</div>


<?php include('footer.php'); ?>