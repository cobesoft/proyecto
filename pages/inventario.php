<?php
session_start();
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2>INVENTARIO GENERAL</h2>
    </div>
    <div class="col-md-4">
      <a href="#" class="btn btn-primary a-btn-slide-text" id="pdf" onclick="">
        <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>
        <span><strong>PDF</strong></span>
      </a>
      <a href="#" class="btn btn-primary a-btn-slide-text" id="excel" onclick="">
        <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>
        <span><strong>Excel</strong></span>
      </a>
      <a href="#" class="btn btn-primary a-btn-slide-text" id="actualizar" onclick="">
        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
        <span><strong>Actualizar</strong></span>
      </a>
    </div>
  </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Id. Producto</th>
            <th>Nombre Producto</th>
            <th>Tipo Producto</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Fecha Adquisición</th>
            <th>Proveedor</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $resultado = $consulta->consultaInventario();
          foreach($resultado as $row) {
            echo "<tr>
            <td>$row[InvProId]</td>
            <td id='pro_$row[InvId]'>$row[ProNombre]</td>
            <td>$row[TprTipo]</td>
            <td>$row[ProPrecio]</td>
            <td>$row[InvCantProd]</td>
            <td>$row[InvFechaCreacion]</td>
            <td>$row[PrvNombre]</td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='movimiento_l' onclick='mostrarModal(\"movimiento\",\"l\",$row[InvId])'>
            <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
            <span><strong>Movimientos</strong></span>
            </a></td>
            <td><a href='#' class='btn btn-primary a-btn-slide-text' id='inventario_el' onclick='mostrarModal(\"inventario\",\"el\",$row[InvId])'>
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
