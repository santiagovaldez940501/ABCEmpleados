<?php

	$conexion = mysqli_connect("localhost","root","") or die ("No se pudo Conectar a  la Base de Datos");
	mysqli_select_db($conexion, "bdempleados") or die ("No se encontró la Tabla dentro de la Base de Datos");
	$sql = "SELECT * FROM empleados where estatus='A'";
	$rec = mysqli_query($conexion,$sql);
if($rec->num_rows>0)
{
	
	
	
	$json = array();
	while($row = mysqli_fetch_array($rec))
	{	
		$puesto= $row['Departamento'];
		$sql2 = "SELECT * from Departamentos where Puesto='$puesto'";
		$rec2 = mysqli_query($conexion,$sql2);
		$row2=mysqli_fetch_array($rec2);
		$json[] = array(
						'Clave_Emp' => $row['Clave_Emp'],
						'Nombre' => $row['Nombre'],
						'ApPaterno' => $row['ApPaterno'],
						'ApMaterno' => $row['ApMaterno'],
						'FecNac' => $row['FecNac'],
						'Departamento' => $row2['Descripcion'],
						'Sueldo' => $row['Sueldo']
					);
	}
	
	$json['success'] = true;
				echo json_encode($json);
}

?>
