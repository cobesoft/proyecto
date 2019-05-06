$(document).ready(function() {
  cargaEventoOpciones();

  $("#login").bind('click', function(e){
    e.preventDefault();
    $("#custom_popup").load('pages/login.php', function() {
      $("#custom_popup").bPopup();
      $("#loginBtn").bind('click', function(e){
        e.preventDefault();
        login();
      });
    });
  });

  renderMap();
});

function cargaEventoOpciones() {
  $(".opciones").click(function(e) {
    e.preventDefault();
    $("#formulario").load($(this).attr("href"), function() {
      renderMap();
    });
  });
}

function login() {
  $.ajax({
    url: "src/valida_login.php",
    method: "POST",
    data: $("#loginForm").serialize(),
    dataType: "json",
    success: function (response) {
      console.log(response);
      $("#loginMsg").html(response.msg);
      if(response.state)
        setTimeout(function(){
          /*$("#custom_popup").bPopup().close();
          $("#navOpciones").html(response.options);
          cargaEventoOpciones();*/
          location.reload();
        }, 2000);
    }
  });
}

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
        cargarDatosPopup(nombre, valor);
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

function cargarDatosPopup(nombre, valor) {
  $.ajax({
    url: "src/popup_editar.php",
    method: "POST",
    data: {nombre: nombre, valor: valor},
    dataType: 'json',
    success: function (response) {
      for(var key in response[0])
        $('#'+key).val(response[0][key]);
    }
  });
}

function listaOpciones(id, opcIds) {
  $('#'+id).chosen().val(opcIds.split(',')).trigger('chosen:updated');
  $('#'+id).prop('disabled', true).trigger('chosen:updated');
}

function editaOpciones(id) {
  if($('#opciones_e_'+id).text() == 'Opciones') {
    $('#sel_'+id).prop('disabled', false).trigger('chosen:updated');
    $('#opciones_e_'+id).text('Actualizar');
  } else {
    $('#sel_'+id).prop('disabled', true).trigger('chosen:updated');
    $('#opciones_e_'+id).text('Opciones');
    $.ajax({
      url: "src/perfil_opciones_actualiza.php",
      method: "POST",
      data: {id: id, opc: $('#sel_'+id).val()},
      //dataType: 'json',
      success: function (response) {
        console.log(response);
      }
    });
  }
}