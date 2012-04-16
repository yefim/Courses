<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <div class="nav-collapse">
        <ul class="nav">
          <li id='index'><a href="index.php">Home</a></li>
          <li id='browse'><a href="browse.php">Browse Meals</a></li>
          <li id='build'><a href="build.php">Build a Meal</a></li>
          <li class='dropdown' id='addmenu'>
            <a class='dropdown-toggle' data-toggle='dropbox' href='addmenu'>
              Add<b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
		          <li id='addDish'><a href="createdish.php">Dish</a></li>
		          <li id='addRecipes'><a href="addRecipes.php">Recipe</a></li>
		          <li id='addIngredient'><a href="createingredient.php">Ingredient</a></li>
            </ul>
          </li>
          <script type='text/javascript'>
            $('.dropdown-toggle').dropdown();
          </script>
        </ul>
        <div class='pull-right'>
          <ul class='nav'>
            <?php if(isset($_SESSION['userID'])) { ?>
              <li><a href="logout.php">Log out</a></li>
            <?php } else { ?>
              <li id='login'><a href="login.php">Log in</a></li>
            <?php } ?>
          </ul>
        </div>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
