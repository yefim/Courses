<?php include('header.php'); ?>
<?php 
	$wantIngArray = array("appet"=>array(), "main"=>array(), "des"=>array());
	for ($i = 0; $i < $_GET['numAppet']; $i++) {
       $wantIngArray['appet'][$i] = mysql_query("SELECT * FROM ingredients ORDER BY ingredients.name");
   }
   	for ($i = 0; $i < $_GET['numMain']; $i++) {
       $wantIngArray['main'][$i] = mysql_query("SELECT * FROM ingredients ORDER BY ingredients.name");
   }
   	for ($i = 0; $i < $_GET['numDes']; $i++) {
       $wantIngArray['des'][$i] = mysql_query("SELECT * FROM ingredients ORDER BY ingredients.name");
   }
   	$uWantIngArray = array("appet"=>array(), "main"=>array(), "des"=>array());
	for ($i = 0; $i < $_GET['numAppet']; $i++) {
       $uWantIngArray['appet'][$i] = mysql_query("SELECT * FROM ingredients ORDER BY ingredients.name");
   }
   	for ($i = 0; $i < $_GET['numMain']; $i++) {
       $uWantIngArray['main'][$i] = mysql_query("SELECT * FROM ingredients ORDER BY ingredients.name");
   }
   	for ($i = 0; $i < $_GET['numDes']; $i++) {
       $uWantIngArray['des'][$i] = mysql_query("SELECT * FROM ingredients ORDER BY ingredients.name");
   }
	?>


<script language='javascript'>
var numAppet = "<?php echo $_GET['numAppet'];?>"
var numMain = "<?php echo $_GET['numMain'];?>"
var numDes = "<?php echo $_GET['numDes'];?>"
var numDrink = "<?php echo $_GET['numDrink'];?>"
</script>
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

<a id="displayText" href="javascript:toggle();">show</a> <== click Here
<div  id="Appetizer 1" style="display:none">
<div>
<div style="position:relative; float:left">Wanted Ingredients: </div> 
<select name="ingredients[]" data-placeholder="Choose ingredients" class="chzn-select" multiple style="width:200px;position:relative;float:left" tabindex="4">
		<option value=""></option>
	<?php
	while($row1 = mysql_fetch_array($wantIngArray['appet'][0])) {
	?>
		<option value="<?php echo $row1['ingredientid'];?>"><?php echo $row1['name'];?></option>
	<?php
	}
	?>
</select>
<br style="clear:both;" />
<br />
<div>
<div style="position:relative; float:left">Unwanted Ingredients:</div>
<select name="ingredients[]" data-placeholder="Choose ingredients" class="chzn-select" multiple style="width:200px;position:relative;float:left" tabindex="5">
		<option value=""></option>
	<?php
	while($row2 = mysql_fetch_array($uWantIngArray['appet'][0])) {
	?>
		<option value="<?php echo $row2['ingredientid'];?>"><?php echo $row2['name'];?></option>
	<?php
	}
	?>
</select>
</div>
</div>
<div id="forloop">
</div>
<script language="javascript">
function generate(){
	var text = document.getElementById("forloop");

	for(var i=0; i<spinCtrl1.GetCurrentValue(); i++){
		text.innerHTML += "appetizer" + spinCtrl1.GetTextboxName();
		
	}
}
function toggle() {
	var ele = document.getElementById("Appetizer 1");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
} 
var spinCtrl1 = new SpinControl('numAppet');
spinCtrl1.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl1.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('appetizerSpin').appendChild(spinCtrl1.GetContainer())
spinCtrl1.SetCurrentValue(numAppet);
spinCtrl1.StartListening();
var spinCtrl2 = new SpinControl('numMain');
spinCtrl2.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl2.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('mainDishSpin').appendChild(spinCtrl2.GetContainer())
spinCtrl2.SetCurrentValue(numMain);
spinCtrl2.StartListening();
var spinCtrl3 = new SpinControl('numDes');
spinCtrl3.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl3.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('dessertSpin').appendChild(spinCtrl3.GetContainer())
spinCtrl3.SetCurrentValue(numDes);
spinCtrl3.StartListening();
var spinCtrl4 = new SpinControl('numDrink');
spinCtrl4.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl4.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('drinkSpin').appendChild(spinCtrl4.GetContainer())
spinCtrl4.SetCurrentValue(numDrink);
spinCtrl4.StartListening();
</script>
<?php include('footer.php'); ?>

