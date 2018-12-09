<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<div class="container">
  <h2>GESTIÓN DE PRODUCTOS
    <a href="#" class="btn btn-primary a-btn-slide-text" id="producto_n" onclick="mostrarModal('producto','n')">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      <span><strong>Nuevo</strong></span>
    </a></h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id. Producto</th>
            <th>Nombre Producto</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Proveedor</th>
            <th>Tipo Producto</th>
            <th>Cantidad Máxima</th>
            <th>Cantidad Mínima</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $resultado = $consulta->consultaProductos();
          foreach($resultado as $row) {
            echo "<tr>
            <td>$row[ProId]</td>
            <td>$row[ProNombre]</td>
            <td>$row[ProPrecio]</td>
            <td>$row[ProDescripcion]</td>
            <td>$row[proveedor]</td>
            <td>$row[tipoProducto]</td>
            <td>$row[ProCantMax]</td>
            <td>$row[ProCantMin]</td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='producto_e' onclick='mostrarModal(\"producto\",\"e\",$row[ProId])'>
            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
            <span><strong>Editar</strong></span>
            </a></td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='producto_el' onclick='mostrarModal(\"producto\",\"el\",$row[ProId])'>
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
