<?php

include_once "consultas.php";

class Permisos
{
    function validaOpciones($respuesta) {
        $consulta = new Consultas();
        $opciones = "<li class='active'><a href='pages/inicio.php' class='opciones'>Inicio</a></li>";
        if (empty($respuesta)) {
            return array("state"=>0,"msg"=>"<span style='color: red;'>Usuario o contraseña incorrectos.</span>", "options"=>$opciones);
        } else {
            $_SESSION['id'] = $respuesta[0]['UsrId'];
            $respuesta = $consulta->consultaPerfilOpciones($respuesta[0]['UsrPerPerId']);
            $respuesta = $respuesta->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($respuesta[0]['PerOpcOpcIds'])) {
                $opcMenu = array();
                $perfilOpciones = explode(',', $respuesta[0]['PerOpcOpcIds']);
                foreach ($perfilOpciones as $value) {
                    $respuesta = $consulta->consultaOpciones($value);
                    $respuesta = $respuesta->fetchAll(PDO::FETCH_ASSOC)[0];
                    if (!array_key_exists($respuesta['OpcIdPadre'], $opcMenu))
                        $opcMenu[$respuesta['OpcIdPadre']] = array('datosPadre' => array('nombre' => $respuesta['nombrePadre'], 'url' => $respuesta['urlPadre']));
                    if (array_key_exists('hijos', $opcMenu[$respuesta['OpcIdPadre']]))
                        $opcMenu[$respuesta['OpcIdPadre']]['hijos'][$respuesta['OpcNombre']] = $respuesta['OpcUrl'];
                    else
                        $opcMenu[$respuesta['OpcIdPadre']]['hijos'] = array($respuesta['OpcNombre'] => $respuesta['OpcUrl']);
                }
                foreach ($opcMenu as $menu) {
                    $opciones .= "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='" . $menu['datosPadre']['url'] . "'>" . $menu['datosPadre']['nombre'] .
                        "<span class='caret'></span></a>
                             <ul class='dropdown-menu'>";
                    foreach ($menu['hijos'] as $nombre => $url) {
                        $opciones .= "<li><a href='$url' class='opciones'>$nombre</a></li>";
                    }
                    $opciones .= "</ul>
                        </li>";
                }
            }
            return array("state"=>1,"msg"=>"<span style='color: green;'>Ingreso satisfactorio.</span>", "options"=>$opciones);
        }
    }
}
