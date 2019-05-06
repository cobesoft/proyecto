<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();

$id =  isset($_REQUEST['id']) && !empty($_REQUEST['id'])?$_REQUEST['id']:null;
$opc = isset($_REQUEST['opc']) && !empty($_REQUEST['opc'])?implode(',',array_filter($_REQUEST['opc'])):null;
if($id && $opc) {
    $respuesta = $consulta->actualizaPerfilOpciones($id, $opc);
    echo "Opciones actualizadas satisfactoriamente";
} else {
    echo "Error en los campos";
}