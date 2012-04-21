<?php include('header.php'); ?>
<?php
  //capture the GET request
  if (isset($_GET['userID'])) {
    $id = $_GET['userID'];
    $first = $_GET['firstname'];
    $last = $_GET['lastname'];
    $result = mysql_query("SELECT * FROM users WHERE FBid=" + $id);
    $num_rows = mysql_num_rows($result);
    //add user if he does not exist yet
    if ($num_rows == 0) {
      mysql_query("INSERT INTO users(FBid, firstname, lastname) VALUES('$id','$first','$last')");
    }
    $_SESSION['userID'] = $id;
    $_SESSION['first'] = $first;
    $_SESSION['last'] = $last;
    header('Location:'.ROOT);
    die();
  }
?>
<div id="fb-root"></div>
<script type='text/javascript' src='javascripts/fb.js'></script>
<div id='description' class='hero-unit'>
  <p>
    King's Courses allows you to follow your dreams and eat your pants off as you trek through
    the world of meals and recipes.  
  </p>
  <p>
    Log in to explore the world of tomorrow.
  </p>
</div>
<div id='fb_login'><a class='btn btn-primary' onclick='FB.login()'/>Login with Facebook</a></div>
<?php include('footer.php'); ?>
