<?php
session_start();
include_once "../config/consultas.php";
include_once "../config/permisos.php";
$consulta = new Consultas();
$permisos = new Permisos();

$usuario = isset($_REQUEST['UsrUsuario']) && !empty($_REQUEST['UsrUsuario'])?$_REQUEST['UsrUsuario']:null;
$clave = isset($_REQUEST['UsrClave']) && !empty($_REQUEST['UsrClave'])?$_REQUEST['UsrClave']:null;
$opciones = "<li class='active'><a href='pages/inicio.php' class='opciones'>Inicio</a></li>";

if($usuario && $clave) {
    $respuesta = $consulta->consultaUsuarios(null, $usuario, $clave);
    $respuesta = $respuesta->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($permisos->validaOpciones($respuesta));
} else {
    echo json_encode(array("state"=>0,"msg"=>"<span style='color: red;'>Debe ingresar usuario y clave de acceso.</span>", "options"=>$opciones));
}