<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a href='<?php echo ROOT ?>/' class='brand'>King's Courses</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li id='browse'><a href="<?php echo ROOT ?>/list.php">List Meals</a></li>
          <li id='build'><a href="<?php echo ROOT ?>/build.php">Build a Meal</a></li>
          <li class='dropdown' id='addmenu'>
            <a class='dropdown-toggle' data-toggle='dropbox' href='addmenu'>
              Add<b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
		          <li id='addDish'><a href="<?php echo ROOT ?>/add/dish.php">Dish</a></li>
		          <li id='addRecipe'><a href="<?php echo ROOT ?>/add/recipe.php">Recipe</a></li>
		          <li id='addIngredient'><a href="<?php echo ROOT ?>/add/ingredient.php">Ingredient</a></li>
            </ul>
          </li>
          <li class='dropdown' id='browsemenu'>
            <a class='dropdown-toggle' data-toggle='dropbox' href='browsemenu'>
              Browse Recipes<b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
		          <li id='browseByCuisine'><a href="<?php echo ROOT ?>/browseByCuisine.php">By Cuisine</a></li>
		          <li id='browseByDish'><a href="<?php echo ROOT ?>/browseByDish.php">By Dish</a></li>
		          <li id='browseByDiet'><a href="<?php echo ROOT ?>/browseByDiet.php">By Diet</a></li>
            </ul>
          </li>		  
		  <li id='yourRecipes'><a href="<?php echo ROOT ?>/recipesMade.php">Your Recipes</a></li>
          <script type='text/javascript'>
            $('.dropdown-toggle').dropdown();
          </script>
        </ul>
        <div class='pull-right'>
          <ul class='nav'>
            <?php if(isset($_SESSION['userID'])) { ?>
              <li><a onclick="FB.logout()" href="<?php echo ROOT ?>/logout.php">Log out</a></li>
            <?php } else { ?>
              <li id='login'><a href="<?php echo ROOT ?>/login.php">Log in</a></li>
            <?php } ?>
          </ul>
        </div>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
