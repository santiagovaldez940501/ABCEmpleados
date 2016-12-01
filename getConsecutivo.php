<?php
$conexion = mysqli_connect("localhost","root","") or die ("No se pudo Conectar a  la Base de Datos");
	mysqli_select_db($conexion, "bdempleados") or die ("No se encontró la Tabla dentro de la Base de Datos");
	$sql = "SELECT * FROM Empleados";
	$rec = mysqli_query($conexion,$sql);
if($rec->num_rows>0)
{
	$json = array();
	while($row = mysqli_fetch_array($rec))
	{	
		$json[] = array(
						'Clave_Emp' => $row['Clave_Emp'],
						'Nombre' => $row['Nombre']
					);
	}
	
	$json['success'] = true;
				echo json_encode($json);
}

?>