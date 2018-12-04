<head>
  <title>Cobe Soft</title>
  <!-- <meta charset="utf-8"> -->
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.bpopup.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery.mapify.css">
  <script type="text/javascript" src="js/jquery.mapify.js"></script>
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
            <a class="navbar-brand" href="#"><img src="img\cobesoft.png" alt="Supercundi" style="margin-top: -7px; max-width:100px;" /></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="pages/inicio.php" class="opciones">Inicio</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="pages/gestion_producto.php" class="opciones">Gestión de Productos</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Proveedores<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="pages/proveedores.php" class="opciones">Gestión de Proveedores</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="pages/clientes.php" class="opciones">Gestión de Clientes</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="pages/usuarios.php" class="opciones">Gestión de Usuarios</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="pages/ventas.php" class"opciones">Reporte Ventas</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
          </ul>
        </div>
        </div>
      </nav>
    </div>

    <div id="body">
      <div id= "formulario">
        <?php include "pages/inicio.php" ?>
      </div>
    </div>

    <div id="custom_popup">
    </div>

    <!--Pie de pagina -->

    <div id="footer" class="text-center">
      <div align="center">
        <img src="img\cobesoft.png" alt="Logo CobeSoft" style="width:20%;" />
      </div>
      <p>2018.Derechos Reservados</p>
    </div>
  </div>
</body>
