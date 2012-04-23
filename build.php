<?php include('header.php'); ?>
<?php
	$diets = mysql_query("SELECT * FROM Diet ORDER BY Diet.name");
?>

<div>
<form action='generate.php' method='get'>
<div>
Dietary Restrictions: <select name="diets[]" data-placeholder="Choose Dietary Restrictions" class="chzn-select" multiple style="width:350px;" tabindex="4">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($diets)) {
	?>
		<option value="<?php echo $row['dietid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
</select>
<br />
Use only ingredients from your inventory: 
</div>
<div style="position:relative;float:left;">Appetizers: </div>
<div id="appetizerSpin"
   style="position:relative;float:left;">
</div>
<div style="position:relative;float:left;"> &nbsp&nbsp&nbspMain Dishes: </div>
<div id="mainDishSpin"
   style="position:relative;float:left;">
</div>
<div style="position:relative;float:left;"> &nbsp&nbsp&nbspDesserts: </div>
<div id="dessertSpin"
   style="position:relative;float:left;">
</div>
<div style="position:relative;float:left;"> &nbsp&nbsp&nbspDrinks: </div>
<div id="drinkSpin"
   style="position:relative;float:left;">
</div>
<div id='generateButton' style="position:relative;float:left;">
  &nbsp&nbsp&nbsp
  <button class='btn btn-primary' onmouseup="generate()">Generate!</button>
</div>
</form>
</div>
<br style="clear:both;" />

<script type="text/javascript">
var spinCtrl1 = new SpinControl('numAppet');
spinCtrl1.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl1.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('appetizerSpin').appendChild(spinCtrl1.GetContainer())
spinCtrl1.StartListening();
var spinCtrl2 = new SpinControl('numMain');
spinCtrl2.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl2.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('mainDishSpin').appendChild(spinCtrl2.GetContainer())
spinCtrl2.StartListening();
var spinCtrl3 = new SpinControl('numDes');
spinCtrl3.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl3.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('dessertSpin').appendChild(spinCtrl3.GetContainer())
spinCtrl3.StartListening();
var spinCtrl4 = new SpinControl('numDrink');
spinCtrl4.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl4.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('drinkSpin').appendChild(spinCtrl4.GetContainer())
spinCtrl4.StartListening();
</script>
<?php include('footer.php'); ?>
