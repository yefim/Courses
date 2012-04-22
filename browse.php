<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
  include('mysql.php');
  include('functions.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Browse Meals</title>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
  <script type='text/javascript' src='<?php echo ROOT ?>/javascripts/table.js'></script>
    <script type='text/javascript' src='<?php echo ROOT ?>/javascripts/ready.js'></script>
    <script type='text/javascript' src='<?php echo ROOT ?>/javascripts/bootstrap-typeahead.js'></script>
    <script type='text/javascript' src='<?php echo ROOT ?>/javascripts/bootstrap-dropdown.js'></script>
    <script type='text/javascript' src='<?php echo ROOT ?>/javascripts/bootstrap-alert.js'></script>
    <script src="<?php echo ROOT ?>/chosen/chosen.jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>/css/bootstrap.css" />
	  <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>/css/base.css" />
	<link rel="stylesheet" href="<?php echo ROOT ?>/css/style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo ROOT ?>/spinner.js"></script>
    <style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#7CB8E2 url(img/header_bkg.png) repeat-x scroll center left; color:#fff; padding:7px 15px; text-align:left;}
        #report td { background:#C7DDEE none repeat-x scroll center left; color:#000; padding:7px 15px; }
        #report tr.odd td { background:#fff url(img/row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        #report div.arrow { background:transparent url(img/arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script>        
</head>
<body>
<?php include('navbar.php'); ?>
    <div id='wrapper'>
	<h1>Meals</h1>
    <table id="report">
        <tr>
            <th>Name</th>
            <th>Creator</th>
            <th>Made On</th>
			<th></th>
            <th></th>
        </tr>
	<?php
    $q = "SELECT creator, mealid, name, firstname, madeon FROM meal NATURAL JOIN users where meal.creator=users.fbid ORDER BY name";
    //echo $q;
    $meals = mysql_query($q);
    while($row = mysql_fetch_array($meals)) {
		$mealid = $row['mealid'];
    ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
        <?php if($row['creator'] == $_SESSION['userID']) { ?> 
          <td><?php echo 'You ('.$row['firstname'].')'; ?></td>
          <td><?php echo date('F j, Y', strtotime($row['madeon'])); ?></td>
          <td><button class='btn' onclick='editMeal(this);'>Edit</button></td>
        <?php } else { ?>
          <td><?php echo $row['firstname']; ?></td>
          <td><?php echo date('F j, Y', strtotime($row['madeon'])); ?></td>
          <?php
          $id = $_SESSION['userID'];
          $q = "SELECT COUNT(mealid) FROM likes WHERE fbid=$id AND mealid=". $row['mealid'];
          $liked = array_pop(mysql_fetch_array(mysql_query($q)));
          if ($liked == 0) {
          ?>
            <td><button class='btn btn-primary' onclick='likeMeal(this);'>Like</button></td>
          <?php } else { ?>
           <td><button class='btn btn-info' onclick='unlike(this);'>Unike</button></td>
          <?php } ?>
        <?php } ?>
            <td><div class="arrow"></div></td>
        </tr>
        <tr>
            <td colspan="5">
					<?php
					$q1 = "SELECT r.name, d.categoryid FROM mealhasrecipes AS mr, recipe as r, dish as d WHERE mr.mealid = $mealid and mr.recipeid = r.recipeid and r.dishid = d.dishid";
					$q2 = "SELECT d.name FROM mealhasdrinks as mr, drink as d WHERE mr.mealid = $mealid and mr.drinkid = d.drinkid";
					$recipes = mysql_query($q1);
					$drinks = mysql_query($q2);
					$appetizers = array();
					$entrees = array();
					$desserts = array();
					while($row1 = mysql_fetch_array($recipes)) {
						if($row1['categoryid'] == 0):
							$appetizers[] = $row1['name'];
						elseif($row1['categoryid'] == 1):
							$entrees[] = $row1['name'];
						else:
							$desserts[] = $row1['name'];
						endif;
					}

					?>
					
					<h4>Appetizers: </h4>
					<?php if(empty($appetizers)) {?>
						<br> This meal has no appetizers. </br>
					<?php }  else { foreach($appetizers as $value) {?>
									<br> <?php echo $value ?> </br>
					<?php } } ?>
					<br></br>
					<h4>Main Courses: </h4>
					<?php if(empty($entrees)) {?>
						<br> This meal has no main courses. </br>
					<?php }  else { foreach($entrees as $value) {?>
									<br> <?php echo $value ?> </br>
					<?php } } ?>
					<br></br>
					<h4>Desserts: </h4>
					<?php if(empty($desserts)) {?>
						<br> This meal has no desserts. </br>
					<?php }  else { foreach($desserts as $value) {?>
									<br> <?php echo $value ?> </br>
					<?php } } ?>
					<br></br>
					<h4>Drinks: </h4>
					<?php if(!isset($drinks)) {?>
						<br> This meal has no drinks. </br>
					<?php }  else { while($drinkrow = mysql_fetch_array($drinks)) {?>
									<br> <?php echo $drinkrow['name'] ?> </br>
					<?php } } ?>
            </td>
        </tr>
     <?php } ?>  
	 </table>

<?php include('footer.php') ?>