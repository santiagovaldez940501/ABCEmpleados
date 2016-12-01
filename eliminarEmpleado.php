<?php
	$conexion = mysql_connect('localhost','root','') or die ('No se pudo Conectar a  la Base de Datos');
	mysql_select_db('bdempleados',$conexion) or die ('No se encontró la Tabla dentro de la Base de Datos');
	//$clave= $_POST['Nombre'];
	//$query = "DELETE * from empleados where Clave_Emp ='";  
	//$result = mysql_query($query); 
	//$result = mysql_query("DELETE * FROM Empleados WHERE  Clave_Emp='".$_POST['Nombre']."'");
	$result = mysql_query("UPDATE empleados set estatus='B' WHERE  Clave_Emp='".$_POST["Nombre"]."'");
	echo $_POST['Nombre'];
?>