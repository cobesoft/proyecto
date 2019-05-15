<?php

class Conexion {
  // local settings
  private $server = 'mysql:host=localhost;port=3306;dbname=COBE_SOFT';
  private $username = 'root';
  private $password = '';
  
  // UNAD
  /*
  private $server = 'mysql:host=localhost;port=3306;dbname=id7537541_cobe_soft';
  private $username = 'root';
  private $password = 'V1s43_S3rv!d0r_Thr33';
   */

  // web connection
  /*private $server = 'mysql:host=localhost;dbname=id7537541_cobe_soft';
  private $username = 'id7537541_cobe_soft';
  private $password = 'SENA_2018';*/

  private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'');
  protected $con;

  function abrirConexion() {
    try {
      // local connection
      $this->con = new PDO($this->server,$this->username,$this->password,$this->options);
      return $this->con;
    } catch(PDOException $e) {
      die("Error: $e");
    }
  }

  function cerrarConexion() {
    $this->con = null;
  }
}

?>
