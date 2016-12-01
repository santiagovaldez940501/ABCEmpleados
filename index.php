<!doctype html>
<html >

<head>
   <!-- Define Charset -->
  <meta charset="utf-8">
  <title>ABC | Empleados</title>

  <!-- CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  
  <!--  JS  -->
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/jquery.migrate.js"></script>
  <script type="text/javascript" src="js/modernizrr.js"></script>
  <script type="text/javascript" src="js/myjava.js"></script>
  <script type="text/javascript" src="dist/sweetalert.min.js"></script>
  

</head>

<body>
   
		<div id="header">
			<br>ABC Empleados
		</div>
		<div id="form">
			<br>Registrar Empleado
			<br><br>
			<div id="registro">
				<div class="form-style">
					<br><br><h1>Datos de Empleado</h1>
					<form>
					<input id="nombre"type="text" name="nombre" placeholder="Nombre(s)"  required/>
					<input id="app" type="text" name="app" placeholder="Apellido Paterno" required/>
					<input id="apm"type="text" name="apm" placeholder="Apellido Materno" required/>
					<input id="fecha" type="date" name="fecha" required />
					<select id="departamento"required>
						<option >Seleccione Departamento</option>
						
					</select>
					<input id="sueldo" type="number" name="sueldo" placeholder="Sueldo" required/>
				</div>
				</form>
					<button id ="btnRegistrar" class="boton-ok" onclick="agregarEmpleado()" value="Registrar" />Registrar</button>
					<button id ="btnCancelar" class="boton-cancelar"  value="Cancelar" />Cancelar</button>
					<button id ="btnEditar" class="boton-edit" onclick="ModificarEmpleado()" value="modify" />Modificar</button>
			
				
			</div>
		</div>
		<div id="tablaHeader">
			<br>Lista de Empleados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="nuevo"class="boton-nuevo">Nuevo</button>
		</div>
		<div id="table" >
			<center>
			
			<table id="empleados" class="hovertable">
				 <thead>
				<tr>
					<th>Clave Empleado</th>
				  <th>Nombre Completo</th>
				  <th>Fecha Nacimiento</th>
				  <th>Departamento</th>
				  <th>Sueldo</th>	
				  <th>Acción</th> 
				</tr>
			   </thead>
			   <tbody id ="tbl_body">
				<!--	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
					<td>Item 1A</td><td>Item 1B</td><td>Item 1C</td><td>Item 1D</td><td>Item 1E</td>
					</tr>-->	
					
				</tbody>
				</table>
			</center>
		</div>
	
</body>
</html>