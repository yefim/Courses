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
	$recipeID = $_POST["recipeID"];
	
	$recipeQ = "SELECT r.recipeid as id, r.name, r.prepTime, r.cookTime, r.instructions " .
			   "FROM recipe r " . 
			   "WHERE r.recipeid=" . $recipeID . " AND creator=" . $_SESSION['userID'];
	
	$recipe = mysql_query($recipeQ);
	
	while($row = mysql_fetch_array($recipe)) {
?>
    <tr class='recipe'>
	  <form name="submitEdit" action="index.php" method="post">
		<input name="recipeID" type="hidden" value="<?php echo $row['id'] ?>">
      <td class='name'>
		<input name="recipeName" type=text size="20" maxlength="300" value="<?php echo $row['name']; ?>">
	  </td>
      <td class='prep'>
	    <input name="prepTime" type=text size="3" maxlength="3" value="<?php echo $row['prepTime']; ?>"></td>
      <td class='cook'>
	    <input name="cookTime" type=text size="3" maxlength="3" value="<?php echo $row['cookTime']; ?>"></td>
      <td class='insn'>
		<textarea name="instructions" cols="50" rows="4"><?php echo $row['instructions']; ?></textarea>
	  </td>
	  <td><button class='btn' onclick(submit)>Submit</button></td>
	  </form>
    </tr>
<?php
	}
?>
    </tbody>
  </table>
</div>

<?php include('footer.php'); ?>
