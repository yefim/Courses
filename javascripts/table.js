var removeItem = function(element) {
  var $row = $(element).parent().parent();
  var id = $row[0].id;
  var ingredient = $row.find('.name').text();
  $('#ingredients option:last').after("<option id='"+id+"'>"+ingredient+"</option>");
  $row.remove();
  $.ajax({
    type:'GET',
    url:'ingredients.php',
    data: {'method':'delete','id':id}
  });
  //window.location = "deleteIngredient.php?id=" + id;
}
var addItem = function(element) {
  var $row = $(element).parent().parent();
  var id = $row.find('select option:selected')[0].id;
  var quantity = $row.find('input').val();
  var ingredient = $row.find('select option:selected').val();
  var row = "<tr class='ingredient' id='"+id+"'>" +
              "<td class='name'>"+ingredient+"</td>" +
              "<td class='quantity'>"+quantity+"</td>" +
              "<td><button class='btn btn-danger' onclick='removeItem(this);'>Remove</button></td>";
  $('#ingredients_table tbody tr:last').before(row);
  $row.find('input').val('');
  $row.find('select option:selected').remove();
  $.ajax({
    type:'GET',
    url:'ingredients.php',
    data: {'method':'insert','id':id, 'quantity':quantity}
  });
}
