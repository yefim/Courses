$(document).ready(function() {
  $(".alert").alert();
  $(".chzn-select").chosen();
  $('.info').hide();
  $("#meals_table tr:odd").addClass("odd");
  $("#meals_table tr:not(.odd)").hide();
  $("#meals_table tr:first-child").show();
  $("#meals_table tr.odd").click(function(){
    $("#meals_table tr:not(.odd)").hide();
    $(this).next("tr").toggle();
  });
  $('.hover-info').hover(function() {
    $(this).children('.info').slideDown('50').fadeTo('50', 1);
  }, function() {
    $(this).children('.info').slideUp('50').fadeTo('50', 0.5);
  });
  $('#ingredients').keypress(function(key) {
    if (key.which == 13) {
      $('#add').trigger('click');
    }
  });
});
