<div class="navbar navbar-fixed-top">
 <div class="navbar-inner">
   <div class="container">
     <div class="nav-collapse">
       <ul class="nav">
         <li id='index'><a href="index.php">Home</a></li>
         <li id='browse'><a href="browse.php">Browse Meals</a></li>
         <li id='build'><a href="build.php">Build a Meal</a></li>
		 <li id='addDish'><a href="createdish.php">Add a Dish</a></li>
		 <li id='addRecipes'><a href="addRecipes.php">Add a Recipe</a></li>
		 <li id='addIngredient'><a href="createingredient.php">Add an Ingredient</a></li>
         <?php if(isset($_SESSION['userID'])) { ?>
          <li><a href="logout.php">Log out</a></li>
         <?php } else { ?>
          <li id='login'><a href="login.php">Log in</a></li>
         <?php } ?>
        </ul>
       <form class="navbar-search pull-right" action="">
         <input type="text" class="search-query span2" placeholder="Browse">
       </form>
     </div><!-- /.nav-collapse -->
   </div><!-- /.container -->
 </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->
