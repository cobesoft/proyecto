<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();

if ($_REQUEST['tipo'] != 'elimina') {
    $_REQUEST['UsrId'] = isset($_REQUEST['UsrId']) && !empty($_REQUEST['UsrId']) ? $_REQUEST['UsrId'] : 0;
    $_REQUEST['UsrCedula'] = isset($_REQUEST['UsrCedula']) && !empty($_REQUEST['UsrCedula']) ? $_REQUEST['UsrCedula'] : salidaMsg(0, 0, 'Cedula');
    $_REQUEST['UsrNombre'] = isset($_REQUEST['UsrNombre']) && !empty($_REQUEST['UsrNombre']) ? $_REQUEST['UsrNombre'] : salidaMsg(0, 0, 'Nombre');
    $_REQUEST['UsrApellido'] = isset($_REQUEST['UsrApellido']) && !empty($_REQUEST['UsrApellido']) ? $_REQUEST['UsrApellido'] : salidaMsg(0, 0, 'Apellido');
    $_REQUEST['UsrCorreo'] = isset($_REQUEST['UsrCorreo']) && !empty($_REQUEST['UsrCorreo']) ? $_REQUEST['UsrCorreo'] : salidaMsg(0, 0, 'Correo');
    $_REQUEST['UsrUsuario'] = isset($_REQUEST['UsrUsuario']) && !empty($_REQUEST['UsrUsuario']) ? $_REQUEST['UsrUsuario'] : salidaMsg(0, 0, 'Usuario');
    if (isset($_REQUEST['chClave'])) {
        $_REQUEST['UsrClave'] = isset($_REQUEST['UsrClave']) && !empty($_REQUEST['UsrClave']) ? $_REQUEST['UsrClave'] : salidaMsg(0, 0, 'Password');
        $_REQUEST['chClave'] = 1;
    } else {
        $_REQUEST['chClave'] = 0;
    }
    $_REQUEST['UsrPerPerId'] = isset($_REQUEST['UsrPerPerId']) && !empty($_REQUEST['UsrPerPerId']) ? $_REQUEST['UsrPerPerId'] : salidaMsg(0, 0, 'Perfil');
    $_REQUEST['UsrPerEstId'] = isset($_REQUEST['UsrPerEstId']) && !empty($_REQUEST['UsrPerEstId']) ? $_REQUEST['UsrPerEstId'] : salidaMsg(0, 0, 'Estado');
}

switch ($_REQUEST['tipo']) {
    case 'crea':
        $resultado = $consulta->consultaUsuarios(NULL, NULL, NULL, $_REQUEST['UsrCedula'])->fetchAll();
        if ($resultado)
            salidaMsg (0, 1, $_REQUEST['UsrCedula']);
        $resultado = $consulta->insertaUsuario($_REQUEST);
        salidaMsg (1, 2, $_REQUEST['tipo']);
        break;
    case 'actualiza':
        $resultado = $consulta->actualizaUsuario($_REQUEST);
        salidaMsg (1, 2, $_REQUEST['tipo']);
        break;
    case 'elimina':
        $resultado = $consulta->eliminaUsuario($_REQUEST);
        salidaMsg (1, 2, $_REQUEST['tipo']);
        break;
}

function salidaMsg($typeid, $txtid, $campo) {
    $txt = ['Error en los campos falta diligenciar', 'El usuario ya existe CC #', "Satisfactoriamente el registro se"];
    $type = ['error', 'success'];
    die(json_encode(array('title'=>'Resultado','type'=>$type[$typeid], 'text'=>"$txt[$txtid] $campo")));
}