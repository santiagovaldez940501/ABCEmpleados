<?php
 
class BaseDatos
{
	private $host = 'localhost';
	private $usuario = 'root';
	private $contraseña = '';
	private $bd = 'bdempleados';
 
    private $conexion;
    private $db;
	
	function __construct() {
		$conexion = $this->conectar();
		if(!empty($conexion)) {
			$this->selectDB($conexion);
		}
	}
 function selectDB($conexion) {
		mysql_select_db($this->database,$conexion);
	}
    public function conectar()
    {
        $this->conexion = mysql_connect($host, $usuario, $contraseña);
        if ($this->conexion == 0) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
        $this->db = mysql_select_db($bd, $this->conexion);
        if ($this->db == 0) DIE("Lo sentimos, no se ha podido conectar con la base datos: " . $bd);
 
        return true;
    }
 
    public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysql_close($this->$conexion);
        }
 
    }
 
}