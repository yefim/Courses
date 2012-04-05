$(document).ready(function() {
  $('.ingredient .quantity').live('dblclick', function() {
    var val = $(this).text();
    var input = '<input type="number" min="1" id="edit" class="input-small" value="'+val+'"/>';
    var $input = $(input);
    $(this).html($input);
    $input.keypress(function(e) {
      if (e.which == 13) {
        var new_q = $(this).val();
        var id = $(this).parent().parent()[0].id;
        $(this).parent().html(new_q);
        //window.location = 'updateIngredient.php?id='+id+'&quantity='+new_q;
        $.ajax({
          type:'GET',
          url:'ingredients.php',
          data: {'method':'update','id':id, 'quantity': new_q}
        });
      }
    });
  });
  $('#quantity').keypress(function(e) {
    if (e.which == 13 && $(this).val().match(/\d+/) != null) {
      $('#add').trigger('click');
    }
  });
});
