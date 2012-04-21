<?php include('header.php'); ?>
<div style="position:relative;border:1px solid black;">
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

