
<head>
  <title>Cobe Soft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remueve el margen básico del menú */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Tamaño cuando la pantalla está 100% */
    .row.content {height: 450px}

    /* Color Capa 1 Fondo */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f2;
      height: 100%;
    }

    /* Color Capa 2 fondo */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* Pantallas pequeñas */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>

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
<!--Título-->

  <div class="container">
  <div class="jumbotron">
    <h1>¡Bienvenido!</h1>
    <p>Sistema de gestión de inventarios CobeSoft</p>
  </div>

<!--Carrusel -->
<div class="container">
  <h2>Estos son algunos de nuestros clientes actuales</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="C:\xampp\htdocs\cobe_soft\img\Supercundi-1.png" alt="Supercundi" style="width:100%;">
      </div>

      <div class="item">
        <img src="C:\xampp\htdocs\cobe_soft\img\merkatodo-1.jpg" alt="merkatodo" style="width:100%;">
      </div>

      <div class="item">
        <img src="C:\xampp\htdocs\cobe_soft\img\kompremas.jpg" alt="kompremas" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!--Texto alternativo de ejemplo -->
<div class="container" style="margin-top:50px">
  <h3>Fixed Navbar</h3>
  <div class="row">
    <div class="col-md-4">
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
    </div>
    <div class="col-md-4">
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
    </div>
    <div class="col-md-4">
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
      <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
    </div>
  </div>
</div>
<!--Pie de pagina -->
<footer class="container-fluid text-center">
  <p>2018.CobeSoft ADSI</p>
</footer>
</body>
