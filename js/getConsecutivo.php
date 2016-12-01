<?php
	$conexion = mysql_connect('localhost','root','') or die ('No se pudo Conectar a  la Base de Datos');
	mysql_select_db('bdempleados',$conexion) or die ('No se encontró la Tabla dentro de la Base de Datos');
	
	$result = mysql_query(" WHERE Nombre='$_POST[Nombre]'",$conexion)or die (mysql_error());
	echo $_POST["Departamento"];
?>