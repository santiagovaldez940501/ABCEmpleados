<?php
	
	$conexion = mysqli_connect("localhost","root","") or die ("No se pudo Conectar a  la Base de Datos");
	mysqli_select_db($conexion, "bdempleados") or die ("No se encontró la Tabla dentro de la Base de Datos");
	$sql = "SELECT * FROM departamentos";
	$rec = mysqli_query($conexion,$sql);
if($rec->num_rows>0)
{
	$json = array();
	while($row = mysqli_fetch_array($rec))
	{	
		$json[] = array(
						'Puesto' => $row['Puesto'],
						'Descripcion' => $row['Descripcion']
					);
	}
	
	$json['success'] = true;
				echo json_encode($json);
}

?>
