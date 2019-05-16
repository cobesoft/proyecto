<?php
include_once "pdo.php";

class Consultas
{

    function consultaEstados()
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT e.EstId, e.EstDescripcion
                  FROM estado as e 
                  ORDER BY e.EstId ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaProductos($id = null)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT p.ProId, p.ProNombre, p.ProPrecio,
                      p.ProDescripcion, p.ProPrvId, pv.PrvNombre AS proveedor,
                      p.ProTprId, tp.TprTipo AS tipoProducto, p.ProCantMax, 
                      p.ProCantMin, p.ProEstId
              FROM producto AS p
              INNER JOIN proveedor AS pv
              ON p.ProPrvId = pv.PrvId
              INNER JOIN tipo_producto AS tp
              ON p.ProTprId = tp.TprId ";
            if ($id)
                $sql .= " WHERE p.ProId = $id ";
            $sql .= " ORDER BY p.ProId ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaTipoProducto()
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT TprId, TprTipo 
                    FROM tipo_producto
                    ORDER BY TprTipo";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaProveedores($id = null)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT p.PrvId, p.PrvNit, p.PrvNombre, p.PrvTelefono, p.PrvDireccion, p.PrvCorreo, p.PrvEstId
              FROM proveedor AS p ";
            if ($id)
                $sql .= " WHERE p.PrvId = $id ";
            $sql .= " ORDER BY p.PrvNombre ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaClientes($id = null)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT  c.CliId, c.CliCedula, c.CliNombre, c.CliApellido, 
                      CONCAT(c.CliNombre, ' ', c.CliApellido) AS nombre,
                      c.CliTelefono, c.CliDireccion, c.CliCorreo, CliEstId
              FROM cliente AS c ";
            if ($id)
                $sql .= " WHERE c.CliId = $id ";
            $sql .= " ORDER BY c.CliApellido ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaUsuarios($id = null, $usuario = null, $clave = null, $cedula = null)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT  u.UsrId, u.UsrCedula, u.UsrNombre, u.UsrApellido, 
                      CONCAT(u.UsrNombre, ' ', u.UsrApellido) AS nombre,
                      u.UsrCorreo, u.UsrFecCreacion, up.UsrPerPerId, p.PerDescripcion, 
                      u.UsrUsuario, up.UsrPerEstId
              FROM usuario AS u
              INNER JOIN usuario_perfil as up
              ON u.UsrId = up.UsrPerUsrId
              INNER JOIN perfil as p
              ON up.UsrPerPerId = p.PerId 
              WHERE TRUE ";
            if ($id)
                $sql .= " AND u.UsrId = $id ";
            if ($usuario && $clave)
                $sql .= " AND u.UsrUsuario = '$usuario' 
                          AND u.UsrClave = MD5('$clave') 
                          AND up.UsrPerEstId = 1 ";
            if ($cedula)
                $sql .= " AND u.UsrCedula = $cedula ";
            $sql .= " ORDER BY p.PerDescripcion, u.UsrApellido ";
            //echo $sql;
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }
    
    function insertaUsuario($data)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "INSERT INTO usuario (UsrCedula, UsrNombre, UsrApellido, UsrCorreo, UsrUsuario, UsrClave, UsrFecCreacion)
                    VALUES ('$data[UsrCedula]','$data[UsrNombre]','$data[UsrApellido]','$data[UsrCorreo]','$data[UsrUsuario]',MD5('$data[UsrCedula]'),NOW()) ";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $id = $db->lastInsertId();
            $sql = "INSERT INTO usuario_perfil (UsrPerUsrId, UsrPerPerId, UsrPerEstId)
                    VALUES ('$id', '$data[UsrPerPerId]', '$data[UsrPerEstId]') ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }
    
    function actualizaUsuario($data)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "UPDATE usuario SET
                        UsrCedula = '$data[UsrCedula]',
                        UsrNombre = '$data[UsrNombre]',
                        UsrApellido = '$data[UsrApellido]',
                        UsrCorreo = '$data[UsrCorreo]',
                        UsrUsuario = '$data[UsrUsuario]' ";
            if($data['chClave'] == 1)
                $sql .= ", UsrClave = MD5('$data[UsrClave]') ";
            $sql .= " WHERE UsrId = '$data[UsrId]' ";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $sql = "UPDATE usuario_perfil SET                    
                    UsrPerPerId = '$data[UsrPerPerId]',
                    UsrPerEstId = '$data[UsrPerEstId]' 
                    WHERE UsrPerUsrId = '$data[UsrId]' ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function eliminaUsuario($data)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "UPDATE usuario_perfil SET                    
                    UsrPerEstId = 3 
                    WHERE UsrPerUsrId = '$data[id]' ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaPerfiles($id = null)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT  p.PerId, p.PerDescripcion, p.PerEstId
                    FROM perfil AS p ";
            if ($id)
                $sql .= " WHERE p.PerId = $id ";
            $sql .= " ORDER BY p.PerDescripcion ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaOpciones($id = null)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT o.OpcId, o.OpcNombre, o.OpcUrl, o.OpcIdPadre, o.OpcEstId, 
                            o1.OpcNombre AS nombrePadre, o1.OpcUrl AS urlPadre
                    FROM opcion AS o
                    INNER JOIN 
					    (SELECT OpcId, OpcNombre, OpcUrl 
						FROM opcion) AS o1
					ON o.OpcIdPadre = o1.OpcId
					WHERE o.OpcEstId = 1 ";
            if ($id)
                $sql .= " AND o.OpcId = $id ";
            $sql .= " ORDER BY o.OpcIdPadre ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function consultaPerfilOpciones($id = null)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "SELECT p.PerId, p.PerDescripcion, po.PerOpcOpcIds
                    FROM perfil AS p
                    LEFT OUTER JOIN perfil_opciones AS po
                    ON p.PerId = po.PerOpcPerId
                    WHERE TRUE ";
            if ($id)
                $sql .= " AND p.PerId = $id ";
            return $db->query($sql);
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

    function actualizaPerfilOpciones($id, $opc)
    {
        try {
            $database = new Conexion();
            $db = $database->abrirConexion();
            $sql = "INSERT INTO perfil_opciones (PerOpcPerId, PerOpcOpcIds)
                    VALUES ($id, '$opc')
                    ON DUPLICATE KEY UPDATE
                    PerOpcOpcIds = '$opc'  ";
            return $db->query($sql);
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
            die("Error: $e");
        }
    }

}
