<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<div class="container">
  <h2>GESTIÓN DE USUARIOS
    <a href="#" class="btn btn-primary a-btn-slide-text" id="producto_n" onclick="mostrarModal('usuario','n')">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <span><strong>Nuevo</strong></span>
    </a></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Cédula</th>
        <th>Nombre Usuario</th>
        <th>Correo Electrónico</th>
        <th>Fecha de Registro</th>
        <th>Perfil</th>
        <th colspan="2">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $resultado = $consulta->consultaUsuarios();
      foreach($resultado as $row) {
        echo "<tr>
        <td>$row[UsrCedula]</td>
        <td>$row[nombre]</td>
        <td>$row[UsrCorreo]</td>
        <td>$row[UsrFecCreacion]</td>
        <td>$row[PerDescripcion]</td>
        <td><a href='#' class='btn btn-primary a-btn-slide-text' id='usuario_e' onclick='mostrarModal(\"usuario\",\"e\",$row[UsrId])'>
        <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
        <span><strong>Editar</strong></span>
        </a></td>
        <td><a href='#' class='btn btn-primary a-btn-slide-text' id='usuario_el' onclick='mostrarModal(\"usuario\",\"el\",$row[UsrId])'>
        <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
        <span><strong>Eliminar</strong></span>
        </a></td>
        </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
