$(document).ready(function() {
  $(".alert").alert();
  $(".chzn-select").chosen();
  $('#ingredients').keypress(function(key) {
    if (key.which == 13) {
      $('#add').trigger('click');
    }
  });
});
