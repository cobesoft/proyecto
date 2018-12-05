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

}
