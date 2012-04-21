<?php include('header.php'); ?>
<?php
	$dishes = mysql_query("SELECT * FROM Dish ORDER BY Dish.name");
	$ingredients = mysql_query("SELECT * FROM Ingredients ORDER BY Ingredients.name");
?>

<div>
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
  <button class='btn btn-primary'>Generate!</button>
</div>
</div>
<br style="clear:both;" />
<script type="text/javascript">
window.onload=function() {
var aRadio=document.getElementsByName('first');
for(var i=0; i<aRadio.length; i++) {
aRadio[i].onclick=function(){secondSet(this);};
}
};

function secondSet(obj) {
if(document.getElementsByName('second')) {removeSecond();}
var parent=document.getElementsByTagName('fieldset')[0];
var txt=['A','B','C','D','E'];
var count=(obj.id=='opt1')? 5 : 2;
for(var i=0; i<count; i++) {
var label=document.createElement('label');
label.appendChild(document.createTextNode(txt[i]+':'));
var radio;
radio=document.createElement('input');
radio.setAttribute('type', 'radio');
radio.setAttribute('name', 'second');
label.appendChild(radio);
parent.appendChild(label);
}
}

function removeSecond() {
var parent=document.getElementsByTagName('fieldset')[0];
var offspring=document.getElementsByTagName('label');
for(var i=offspring.length-1; i>=2; i--) {
parent.removeChild(offspring[i]);
}
}
</script>

<style type="text/css">
label {display:block;}
</style>

<form action="#" name="form1">
<fieldset><legend>radio buttons</legend>
<label>option 1:<input type="radio" id="opt1" name="first"></label>
<label>option 2:<input type="radio" id="opt2" name="first"></label>
</fieldset>
</form>



<div id='recipes'>
  <h2>Select Recipes</h2>
  <hr>
  <table class='table'>
    <thead>
      <tr>
        <th>Recipe Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type='text' placeholder='Recipe...'/></td>
      </tr>
    </tbody>
  </table>
</div>
<div id='drinks'>
  <h2>Select a Drink</h2>
  <hr>
  <select>
    <option>Coke</option>
    <option>Sprite</option>
    <option>Green Tea</option>
    <option>Red Tea</option>
    <option>Black Tea</option>
  </select>
</div>
<select name="ingredients[]" data-placeholder="Choose ingredients" class="chzn-select" multiple style="width:350px;" tabindex="4">
		<option value=""></option>
	<?php
	while($row = mysql_fetch_array($ingredients)) {
	?>
		<option value="<?php echo $row['ingredientid'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	?>
</select>
<div id='diet'>
  <h2>Select the dietary restrictions</h2>
  <hr>
  <select multiple='multiple'>
    <option>Vegan</option>
    <option>Vegetarian</option>
    <option>Gluten-Free</option>
    <option>Carb-Free</option>
    <option>Lactose-Free</option>
    <option>Peanut-Free</option>
  </select>
<div>
<div id='buttons'>
  <button class='btn btn-primary'>Build my Meal</button>
</div>
<script type="text/javascript">
var spinCtrl1 = new SpinControl();
spinCtrl1.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl1.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('appetizerSpin').appendChild(spinCtrl1.GetContainer())
spinCtrl1.StartListening();
var spinCtrl2 = new SpinControl();
spinCtrl2.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl2.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('mainDishSpin').appendChild(spinCtrl2.GetContainer())
spinCtrl2.StartListening();
var spinCtrl3 = new SpinControl();
spinCtrl3.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl3.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('dessertSpin').appendChild(spinCtrl3.GetContainer())
spinCtrl3.StartListening();
var spinCtrl4 = new SpinControl();
spinCtrl4.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 500));
spinCtrl4.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 1750));
document.getElementById('drinkSpin').appendChild(spinCtrl4.GetContainer())
spinCtrl4.StartListening();
</script>
<?php include('footer.php'); ?>
