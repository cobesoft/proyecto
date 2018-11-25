$(document).ready(function() {
  $(".opciones").click(function(e) {
    e.preventDefault();
    $("#formulario").load($(this).attr("href"));
  });

  $("#login").bind('click', function(e){
    e.preventDefault();
    $("#login_popup").bPopup();
  });
});
