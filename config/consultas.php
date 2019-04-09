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

  function consultaProveedores()
  {
    try {
      $database = new Conexion();
      $db = $database->abrirConexion();
      $sql = "SELECT p.PrvId, p.PrvNit, p.PrvNombre, p.PrvTelefono, p.PrvDireccion, p.PrvCorreo
              FROM proveedor AS p
              ORDER BY p.PrvNombre";
      return $db->query($sql);
    }catch(PDOException $e) {
      die("Error: $e");
    }
  }

  function consultaClientes()
  {
    try {
      $database = new Conexion();
      $db = $database->abrirConexion();
      $sql = "SELECT  c.CliId, c.CliCedula, CONCAT(c.CliNombre, ' ', c.CliApellido) AS nombre,
                      c.CliTelefono, c.CliDireccion, c.CliCorreo
              FROM cliente AS c
              ORDER BY c.CliApellido";
      return $db->query($sql);
    }catch(PDOException $e) {
      die("Error: $e");
    }
  }

  function consultaUsuarios()
  {
    try {
      $database = new Conexion();
      $db = $database->abrirConexion();
      $sql = "SELECT  u.UsrId, u.UsrCedula, CONCAT(u.UsrNombre, ' ', u.UsrApellido) AS nombre,
                      u.UsrCorreo, u.UsrFecCreacion, p.PerDescripcion
              FROM usuario AS u
              INNER JOIN usuario_perfil as up
              ON u.UsrId = up.UsrPerUsrId
              INNER JOIN perfil as p
              ON up.UsrPerPerId = p.PerId
              ORDER BY p.PerDescripcion, u.UsrApellido";
      return $db->query($sql);
    }catch(PDOException $e) {
      die("Error: $e");
    }
  }

  function consultaInventario()
  {
    try {
      $database = new Conexion();
      $db = $database->abrirConexion();
      $sql = "SELECT  i.InvId, i.InvProId, p.ProNombre, tp.TprTipo, p.ProPrecio,
                      i.InvCantProd, i.InvFechaCreacion, pv.PrvNombre
              FROM inventario AS i
              INNER JOIN producto AS p
              ON i.InvProId = p.ProId
              INNER JOIN tipo_producto as tp
              ON p.ProTprId = tp.TprId
              INNER JOIN proveedor AS pv
              ON p.ProPrvId = pv.PrvId
              ORDER BY p.ProNombre";
      return $db->query($sql);
    }catch(PDOException $e) {
      die("Error: $e");
    }
  }

  function consultaMovimiento($id, $tipo)
  {
    try {
      $database = new Conexion();
      $db = $database->abrirConexion();
      switch ($tipo) {
        case 'Facturas de Venta':
          $sql = "SELECT  i.InvProId, ROUND(p.ProPrecio,2) AS ProPrecio,
                          ROUND(pf.ProFacPrecio,2) AS ProFacPrecio, pf.ProFacCantidad,
                          CONCAT(f.FacImpuesto*100,'%') AS impuesto,
                          ROUND(pf.ProFacPrecio * pf.ProFacCantidad,2) AS total,
                          f.FacFecha, tv.TvtTipo,
                          CONCAT(c.CliNombre, ' ', c.CliApellido) AS cliente
                  FROM inventario AS i
                  INNER JOIN producto AS p
                  ON i.InvProId = p.ProId
                  INNER JOIN producto_factura AS pf
                  ON p.ProId = pf.ProFacProId
                  INNER JOIN factura AS f
                  ON pf.ProFacFacId = f.FacId
                  INNER JOIN tipo_venta AS tv
                  ON f.FacTvtId = tv.TvtId
                  INNER JOIN cliente AS c
                  ON f.FacCliId = c.CliId
                  WHERE i.InvId = $id
                  ORDER BY f.FacFecha";
          break;
        case 'Ordenes de Pedido':
          $sql = "SELECT  i.InvProId, ROUND(p.ProPrecio,2) AS ProPrecio,
                          ROUND(pp.ProPedPrecio,2) AS ProPedPrecio, pp.ProPedCantidad,
                          ROUND(pp.ProPedPrecio * pp.ProPedCantidad,2) AS total, pd.PedFecha,
                          CONCAT(u.UsrNombre, ' ', u.UsrApellido) AS responsable
                  FROM inventario AS i
                  INNER JOIN producto AS p
                  ON i.InvProId = p.ProId
                  INNER JOIN producto_pedido AS pp
                  ON p.ProId = pp.ProPedProId
                  INNER JOIN pedido AS pd
                  ON pp.ProPedPedId = pd.PedId
                  INNER JOIN usuario AS u
                  ON pd.PedUsrId = u.UsrId
                  WHERE i.InvId = $id
                  ORDER BY pd.PedFecha";
          break;
      }
      return $db->query($sql);
    }catch(PDOException $e) {
      die("Error: $e");
    }
  }

}
