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
  var ingredient = $row.find('#ingredients').val();
  var row = "<tr class='ingredient'>" +
              "<td class='name'>"+ingredient+"</td>" +
              "<td><button class='btn btn-danger' onclick='removeItem(this);'>Remove</button></td>";
  $('#ingredients_table tbody tr:last').before(row);
  $row.find('input').val('');
  $.ajax({
    type:'GET',
    url:'ingredients.php',
    data: {'method':'insert','ingredient':ingredient}
  });
}
var likeMeal = function(element) {
  var id = $(element).closest('tr')[0].id;
  $(element).replaceWith("<button class='btn btn-info' onclick='unlike(this);'>Unlike</button>");
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
    $table.replaceWith("<h4 class='red'>You have not liked any meals yet.</h4>");
  }
  $.ajax({
    type:'GET',
    url:'meals.php',
    data: {'method':'unlike','id':id}
  });
}
var removeMeal = function(element) {
  $row = $(element).closest('tr');
  var id = $row[0].id;
  $row.next().remove();
  $row.remove();
  //window.location = 'meals.php?method=delete&id='+id;
  $.ajax({
    type:'GET',
    url:'meals.php',
    data: {'method':'delete','id':id}
  });
}
var unlike = function(element) {
  var $row = $(element).closest('tr');
  $(element).replaceWith("<button class='btn btn-primary' onclick='likeMeal(this);'>Like</button>");
  var id = $row[0].id;
  $.ajax({
    type:'GET',
    url:'meals.php',
    data: {'method':'unlike','id':id}
  });
}
