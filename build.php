<?php include('header.php'); ?>
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
<?php include('footer.php'); ?>
