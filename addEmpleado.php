<?php
	//require_once("conexion.php");
	//$db = new BaseDatos();
	
	
		$conexion = mysql_connect('localhost','root','') ;
		mysql_select_db('bdempleados',$conexion);
		//$result = mysql_query("UPDATE empleados set ".$_POST["column"]." = '".$_POST["editval"]."' WHERE  RPE='".$_POST["RPE"]."'");
		$result = mysql_query("INSERT INTO empleados (Nombre, ApPaterno, ApMaterno, FecNac, Departamento, Sueldo, estatus)
		VALUES ('".$_POST["Nombre"]."', '".$_POST["ApPaterno"]."','".$_POST["ApMaterno"]."','".$_POST["FecNac"]."','".$_POST["Departamento"]."','".$_POST["Sueldo"]."','A');");
	?>