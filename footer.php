
<script src="chosen/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen();</script>

<?php
$array = array(0 => "<a href='http://twitter.com/yefim323'>Geoff</a>",
1 => "<a href=''>Angela</a>",
2 => "<a href=''>Johanna</a>",
3 => "<a href=''>Mike</a>");
$a = rand(0,3); 
$b = rand(0,3); while($b == $a){ $b = rand(0,3); }
$c = rand(0,3); while(($c == $a) || ($c == $b)) { $c = rand(0,3); }
$d = rand(0,3); while(($d == $a) || ($d == $b) || ($d == $c)) { $d = rand(0,3); }
?>

      <footer>
        <hr/>
        <p>&copy King's Courses 2012</p>
        <p>CIS330 Project by 
          <?php echo $array[$a] ?>, 
          <?php echo $array[$b] ?>, 
          <?php echo $array[$c] ?>, 
          and <?php echo $array[$d] ?></p>
      </footer>
    </div> <!--  closes wrapper div -->
  </body>
</html>
