<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<div class="container">
  <h2>GESTIÓN DE PROVEEDORES
    <a href="#" class="btn btn-primary a-btn-slide-text" id="proveedor_n" onclick="mostrarModal('proveedor','n')">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      <span><strong>Nuevo</strong></span>
    </a></h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NIT</th>
            <th>Nombre Proveedor</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Correo Electrónico</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $resultado = $consulta->consultaProveedores();
          foreach($resultado as $row) {
            echo "<tr class='".($row['PrvEstId']==2?"warning":($row['PrvEstId']==3?"danger":''))."'>
            <td>$row[PrvNit]</td>
            <td>$row[PrvNombre]</td>
            <td>$row[PrvTelefono]</td>
            <td>$row[PrvDireccion]</td>
            <td>$row[PrvCorreo]</td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='proveedor_e' onclick='mostrarModal(\"proveedor\",\"e\",$row[PrvId])'>
            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
            <span><strong>Editar</strong></span>
            </a></td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='proveedor_el' onclick='mostrarModal(\"proveedor\",\"el\",$row[PrvId])'>
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
