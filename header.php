<?php
  session_start();
  include('mysql.php');
?>
<html>
  <head>
    <title>King's Courses</title>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
    <script type='text/javascript' src='javascripts/table.js'></script>
    <script type='text/javascript' src='javascripts/ready.js'></script>
    <script type='text/javascript' src='javascripts/bootstrap-typeahead.js'></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	  <link rel="stylesheet" type="text/css" href="css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="css/base.css" />
  </head>
  <body>
    <?php include('navbar.php') ?>
    <div id='wrapper'>
    <div class='header'>
      <h1>
        King's Courses
        <?php if(isset($_SESSION['userID'])) { ?>
          <small class='small'>Welcome, <?php echo $_SESSION['first']; ?>!</small>
        <?php } ?>
      </h1>
    </div>
