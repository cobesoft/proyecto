<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<div class="container">
  <h2>GESTIÓN DE CLIENTES
    <a href="#" class="btn btn-primary a-btn-slide-text" id="cliente_n" onclick="mostrarModal('cliente','n')">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      <span><strong>Nuevo</strong></span>
    </a></h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Cédula</th>
            <th>Nombre Cliente</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Correo Electrónico</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $resultado = $consulta->consultaClientes();
          foreach($resultado as $row) {
            echo "<tr class='".($row['CliEstId']==2?"warning":($row['CliEstId']==3?"danger":''))."'>
            <td>$row[CliCedula]</td>
            <td>$row[nombre]</td>
            <td>$row[CliTelefono]</td>
            <td>$row[CliDireccion]</td>
            <td>$row[CliCorreo]</td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='cliente_e' onclick='mostrarModal(\"cliente\",\"e\",$row[CliId])'>
            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
            <span><strong>Editar</strong></span>
            </a></td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='cliente_el' onclick='mostrarModal(\"cliente\",\"el\",$row[CliId])'>
            <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
            <span><strong>Eliminar</strong></span>
            </a></td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
