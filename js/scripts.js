$(document).ready(function() {
  $(".opciones").click(function(e) {
    e.preventDefault();
    $("#formulario").load($(this).attr("href"), function() {
    	renderMap();
    });
  });

  $("#login").bind('click', function(e){
    e.preventDefault();
    $("#custom_popup").load('pages/login.php', function() {
      $("#custom_popup").bPopup();
    });
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

function mostrarModal(nombre, tipo, valor=null) {
  switch (tipo) {
    case 'n':
      $("#custom_popup").load('pages/'+nombre+'.php', function() {
        $("#custom_popup").bPopup();
        $("#"+nombre+"_titulo").text("Agregar " + nombre);
        $("#"+nombre+"_boton").text("Agregar nuevo " + nombre);
      });
      break;
    case 'e':
      $("#custom_popup").load('pages/'+nombre+'.php', function() {
        $("#custom_popup").bPopup();
        $("#"+nombre+"_titulo").text("Editar " + nombre);
        $("#"+nombre+"_boton").text("Guardar cambios en " + nombre);
      });
      break;
    case 'el':
      $("#custom_popup").load('pages/eliminar.php', function() {
        $("#custom_popup").bPopup();
        $("#titulo_eliminar").text("Eliminar " + nombre);
        $("#texto_eliminar").text("¿Desea eliminar " + nombre + "?");
        $("#cerrar").bind('click', function() {
          $("#custom_popup").bPopup().close();
        });
      });
      break;
    case 'l':
        $("#custom_popup").load('pages/'+nombre+'.php?id='+valor, function() {
          $("#custom_popup").bPopup();
          $("#"+nombre+"_titulo").text("Movimientos del Producto " + $('#pro_'+valor).html());
          $("#cerrar").bind('click', function() {
            $("#custom_popup").bPopup().close();
          });
        });
      break;
  }
}
