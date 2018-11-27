$(document).ready(function() {
  $(".opciones").click(function(e) {
    e.preventDefault();
    $("#formulario").load($(this).attr("href"), function() {
    	renderMap();
    });
  });

  $("#login").bind('click', function(e){
    e.preventDefault();
    $("#login_popup").bPopup();
  });

  renderMap();
});


function renderMap() {
	$("img[usemap]").mapify({
  	popOver: {
  		content: function(zone){ 
  			return $("#"+zone.attr("data-title")).html();
  		},
		delay: 0.7,
		margin: "5px",
		height: "360px",
		width: "260px"
	}
  });
}