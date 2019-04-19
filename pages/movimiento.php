<?php
include_once "../config/consultas.php";
$consulta = new Consultas();
?>
<a class="bClose">X<a/>
<div class="main-div" style="width: 90vw;">
    <h2 id="movimiento_titulo">Movimientos del Producto</h2>
    <div class="panel-group" id="accordion" style="overflow-x:auto;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Facturas de Venta</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">
            <?php listaMovimientos($_GET['id'],
            ['Id. Producto', 'Precio', 'Precio Venta', 'Cantidad', 'Impuesto', 'Vr. Total', 'Fecha Venta', 'Tipo de Venta', 'Cliente'],
            'Facturas de Venta'); ?>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Ordenes de Pedido</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
            <?php listaMovimientos($_GET['id'],
            ['Id. Producto', 'Precio', 'Precio Pedido', 'Cantidad', 'Vr. Total', 'Fecha Pedido', 'Responsable'],
            'Ordenes de Pedido'); ?>
          </div>
        </div>
      </div>
    </div>
    <button class="btn btn-primary" id="cerrar">Cerrar</button>
  </div>

<?php
function listaMovimientos($id, $campos, $tipo) {
  $resultado = $GLOBALS['consulta']->consultaMovimiento($id, $tipo);
  if ($resultado->rowCount()) {
    echo "<div class='table-responsive'>
    <table class='table table-striped'>
    <thead>
    <tr>";
    foreach ($campos as $campo) {
      echo "<th>$campo</th>";
    }
    echo "</tr>
    </thead>
    <tbody>";
    foreach($resultado as $row) {
      echo "<tr>";
      foreach ($row as $value) {
        echo "<td>$value</td>";
      }
      echo "</tr>";
    }
    echo "</tbody>
    </table>
    </div>";
  } else {
    echo "<strong>No se encuentran $tipo</strong>";
  }

}
?>
