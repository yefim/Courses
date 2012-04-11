var removeItem = function(element) {
  var $row = $(element).closest('tr');
  var ingredient = $row.find('.name').text();
  $row.remove();
  $.ajax({
    type:'GET',
    url:'ingredients.php',
    data: {'method':'delete','ingredient':ingredient}
  });
  //window.location = "deleteIngredient.php?id=" + id;
}
var addItem = function(element) {
  var $row = $(element).closest('tr');
  var quantity = $row.find('#quantity').val();
  var ingredient = $row.find('#ingredients').val();
  var row = "<tr class='ingredient'>" +
              "<td class='name'>"+ingredient+"</td>" +
              "<td class='quantity'>"+quantity+"</td>" +
              "<td><button class='btn btn-danger' onclick='removeItem(this);'>Remove</button></td>";
  $('#ingredients_table tbody tr:last').before(row);
  $row.find('input').val('');
  $.ajax({
    type:'GET',
    url:'ingredients.php',
    data: {'method':'insert','ingredient':ingredient, 'quantity':quantity}
  });
}
var likeMeal = function(element) {
  var id = $(element).closest('tr')[0].id;
  $(element).replaceWith('liked');
  $.ajax({
    type:'GET',
    url:'meals.php',
    data: {'method':'like','id':id}
  });
}
var unlikeMeal = function(element) {
  var $row = $(element).closest('tr');
  var id = $row[0].id;
  $row.remove();
  var $table = $('#meals_table');
  var row_count = $table.find('tr').length;
  if (row_count === 1) {
    $table.replaceWith("<h4>You have not liked any meals yet.</h4>");
  }

  console.log(row_count);
  $.ajax({
    type:'GET',
    url:'meals.php',
    data: {'method':'unlike','id':id}
  });
}
