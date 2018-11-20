<head>
  <title>Cobe Soft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<!--<menu></menu> -->

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CobeSoft</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Inicio</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Gestión de Productos</a></li>
        </ul>
      </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Proveedores<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Gestión de Proveedores</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Gestión de Clientes</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Gestión de Usuarios</a></li>
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
<div id= "formulario">
<?php include "pages/inicio.php" ?>
</div>
<!--Pie de pagina -->
<footer class="container-fluid text-center">
  <div align="center"><img src="img\CobeSoft.png" alt="Supercundi" style="width:20%;">
  </div>
  <p>2018.Derechos Reservados</p>
</footer>

</body>
