<?php
	$conexion = mysql_connect('localhost','root','') or die ('No se pudo Conectar a  la Base de Datos');
	mysql_select_db('bdempleados',$conexion) or die ('No se encontró la Tabla dentro de la Base de Datos');
	
	$result = mysql_query("UPDATE empleados set Nombre='$_POST[Nombre]', ApPaterno='$_POST[ApPaterno]',ApMaterno='$_POST[ApMaterno]',FecNac='$_POST[FecNac]', Departamento='$_POST[Departamento]',Sueldo='$_POST[Sueldo]' WHERE Nombre='$_POST[Nombre]'",$conexion)or die (mysql_error());
	echo $_POST["Departamento"];
	?>