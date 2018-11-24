<head>
  <title>Cobe Soft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <!--<menu></menu> -->
  <div id="container">
    <div id="header">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="img\cobesoft.png" alt="Supercundi" style="margin-top: -7px; max-width:100px;" /></a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="pages/inicio.php" class="opciones">Inicio</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="pages/producto.php" class="opciones">Gestión de Productos</a></li>
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
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacto<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Reportar Novedad</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div id="body">
      <div id= "formulario">
        <?php include "pages/inicio.php" ?>
      </div>
    </div>

    <!--Pie de pagina -->

    <div id="footer" class="text-center">
      <div align="center"><img src="img\cobesoft.png" alt="Supercundi" style="width:20%;" />
      </div>
      <p>2018.Derechos Reservados</p>
    </div>
  </div>
</body>
