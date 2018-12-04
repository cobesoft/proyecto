<?php
include_once "pdo.php";

class Consultas
{

  function consultaProductos()
  {
    try {
      $database = new Conexion();
      $db = $database->abrirConexion();
      $sql = "SELECT 	p.ProId, p.ProNombre, p.ProPrecio,
                      p.ProDescripcion, pv.PrvNombre AS proveedor,
                      tp.TprTipo AS tipoProducto, p.ProCantMax, p.ProCantMin
              FROM producto AS p
              INNER JOIN proveedor AS pv
              ON p.ProPrvId = pv.PrvId
              INNER JOIN tipo_producto AS tp
              ON p.ProTprId = tp.TprId
              ORDER BY p.ProId";
      return $db->query($sql);
    }catch(PDOException $e) {
      die("Error: $e");
    }
  }

}
