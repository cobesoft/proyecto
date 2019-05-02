<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();

switch ($_REQUEST['nombre']) {
    case 'producto':
        $resultado = $consulta->consultaProductos($_REQUEST['valor']);
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;
    case 'cliente':
        $resultado = $consulta->consultaClientes($_REQUEST['valor']);
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;
    case 'proveedor':
        $resultado = $consulta->consultaProveedores($_REQUEST['valor']);
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;
    case 'usuario':
        $resultado = $consulta->consultaUsuarios($_REQUEST['valor']);
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;
    case 'perfil':
        $resultado = $consulta->consultaPerfiles($_REQUEST['valor']);
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;
}