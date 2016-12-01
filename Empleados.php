<?php
include ("conexion.php");

$bd = new BaseDatos();
class Empleados
{
    private $Clave_Emp;
	private $Nombre;
	private $ApPaterno;
	private $ApMaterno;
	private $FecNac;
	private $Departamento;
	private $Sueldo;
 
    public function Registrar()
    {
        return true;
    }
 
    public function Modificar()
    {
       return true;
    }
 
    public function Eliminar()
    {
       return true;
    }
}
<?