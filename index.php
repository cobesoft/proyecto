<?php
session_start();
include_once "config/consultas.php";
include_once "config/permisos.php";
$consulta = new Consultas();
$permisos = new Permisos();
?>
<head>
    <title>Cobe Soft</title>
    <!-- <meta charset="utf-8"> -->
    <link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
    <link rel="manifest" href="img/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/icon//ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.bpopup.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.mapify.css">
    <script type="text/javascript" src="js/jquery.mapify.js"></script>
    <link rel="stylesheet" type="text/css" href="css/chosen.min.css">
    <script type="text/javascript" src="js/chosen.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
    <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<!--<menu></menu> -->
<div id="container">
    <div id="header">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img\cobesoft.png" alt="Supercundi"
                                                          style="margin-top: -7px; max-width:100px;"/></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav" id="navOpciones">
                        <li class="active"><a href="pages/inicio.php" class="opciones">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="navState">
                        <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="body">
        <div id="formulario">
            <?php include "pages/inicio.php" ?>
        </div>
    </div>

    <div id="custom_popup">
    </div>

    <!--Pie de pagina -->

    <div id="footer" class="text-center">
        <div align="center">
            <img src="img\cobesoft.png" alt="Logo CobeSoft" style="width:20%;"/>
        </div>
        <p>2018.Derechos Reservados</p>
    </div>
</div>
<?php
if (isset($_SESSION['id'])) {
    $respuesta = $consulta->consultaUsuarios($_SESSION['id']);
    $respuesta = $respuesta->fetchAll(PDO::FETCH_ASSOC);
    $logout = "<li class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <span class='glyphicon glyphicon-user mysize'></span> - ".
                        $respuesta[0]['PerDescripcion'].
                    " - </a>
                    <ul class='dropdown-menu'>
                        <li><span class='text-success'>Nombre: <strong>".$respuesta[0]['UsrNombre']."</strong></span></li>
                        <li><span class='text-success'>Apellido: <strong>".$respuesta[0]['UsrApellido']."</strong></span></li>
                        <li><a href='#' id='logout'><span class='glyphicon glyphicon-log-out'></span>Salir</a></li>";
    $respuesta = $permisos->validaOpciones($respuesta);
    echo "<script>
            $(document).ready(function() {
                $('#navOpciones').html(\"".preg_replace( "/\r|\n/", "", $respuesta['options'])."\");
                $('#navState').html(\"".preg_replace( "/\r|\n/", "", $logout)."\");
                $('#logout').bind('click', function(e) {
                  e.preventDefault();
                  document.location = 'pages/logout.php';
                });
                cargaEventoOpciones();
            });
        </script>";
}
?>
</body>