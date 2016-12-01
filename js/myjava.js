$(document).ready(function(){
	var Clave;
	 $("#nombre").focus();
	 $('#btnEditar').attr("disabled", true);
	//CLIC EN BOTON nuevo	
	$("#nuevo").click(function(e) {
        $("#nombre").val("");
        $("#app").val("");
        $("#apm").val("");
        $("#fecha").val("");
        $("#sueldo").val("");
        $("#nombre").focus();
    });
	
	$.ajax({
			url: 'addDepartamentos.php',
			type: 'post',
			data: { tag: 'getData'},
			dataType: 'json',
			success: function (data) {
				if (data.success) {
					
					$.each(data, function (index, record) {
						if ($.isNumeric(index)) { 
							var option = document.createElement("option");
							option.value = record.Puesto;
							option.text = record.Descripcion;
							$("#departamento").append(option);
						}
					})
				}
			}
		});
		
		
	$.ajax({
			url: './loadEmpleados.php',
			type: 'post',
			data: { tag: 'getData'},
			dataType: 'json',
			success: function (data) {
				if (data.success) {
					$.each(data, function (index, record) {
						if ($.isNumeric(index)) { 
							var cadena = record.Nombre;
							Clave_Emp= record.Clave_Emp;
							var nombre_completo = record.Nombre + " " + record.ApPaterno + " " + record.ApMaterno;
							var row = $("<tr>");
							$("<td/>").text(record.Clave_Emp).appendTo(row);
							$("<td/>").text(nombre_completo).appendTo(row);
							$("<td/>").text(record.FecNac).appendTo(row);
							$("<td/>").text(record.Departamento).appendTo(row);
							$("<td/>").text(record.Sueldo).appendTo(row);
							$("<td><button class='boton-edit' onClick='editarEmpleado(this.parentNode.parentNode)'name='edit"+record.Clave_Emp+"' id='edit"+record.Clave_Emp+"'>Editar</button><button class='boton-elim' onClick='eliminarEmpleado(this.parentNode.parentNode)' id='elim"+record.Clave_Emp+"'>Eliminar</button></td>").appendTo(row);
							row.appendTo("#empleados");
						}
					})
				}
			}
		});
	
});
//AREGAR EMPLEADO
function agregarEmpleado(){
	var nombre = $("#nombre").val();
	var app = $("#app").val();
	var apm = $("#apm").val();
	var fecha = $("#fecha").val();
	var departamento = $("#departamento").val();
	var sueldo = $("#sueldo").val();
	
	if (nombre=="")
	{
		$("#nombre").focus();
		swal("Falta Nombre");
		
	}
	else if (app =="")
	{
		$("#app").focus();
		swal("Falta Apellido Paterno");
	}
	else if (apm == "")
	{
		$("#apm").focus();
		swal("Falta Apellido Materno");
	}
	else if(fecha=="")
	{
		swal("Falta Fecha");
	}
	else if (sueldo==0)
	{
		$("#fecha").focus();
		swal("Falta Sueldo");
	}
	else if (departamento==0)
	{
		$("#departamento").focus();
		swal("Falta Departamento");
	}
	else{
		$.ajax({
		url: "./addEmpleado.php",
		type: "POST",
		data:'Nombre='+nombre+'&ApPaterno='+app+'&ApMaterno='+apm+'&FecNac='+fecha+'&Departamento='+departamento+'&Sueldo='+sueldo,
		success: function(data){
			swal("Guardado!", "Empleado Registrado", "success")
			addToTable();
		}
		});
		
		
	}
	
}

function eliminarEmpleado(r){
	var row = r;
	var cells = row.querySelectorAll('td:not(:last-of-type)');
	var Clave_Emp = cells[0].innerText;
	var Clave = Clave_Emp;
	swal({
  title: "¿Seguro de Continuar?",
  text: "No se podrá recuperar el registro!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Sí, Eliminar!",
  closeOnConfirm: false
},
function(){
	document.querySelector('#empleados tbody').removeChild(row);
	$.ajax({
		url: "./eliminarEmpleado.php",
		type: "POST",
		data:'Nombre='+Clave,
		success: function(data){
			swal("Eliminado!", "Empleado Eliminado", "success")
			
		}
		});
});
	
  
}

function editarEmpleado(r){
	var row = r;
	var cells = row.querySelectorAll('td:not(:last-of-type)');
	//$("#nombre").val(cells[1].innerText);
	Clave = cells[0].innerText;
	var nombre= cells[1].innerText;
	var name;
	var app;
	var apm;
	
	$("#fecha").val(cells[2].innerText);
	$("#departamento option:selected").text(cells[3].innerText);
	$("#sueldo").val(cells[4].innerText);
	
	nombre = nombre.split(" ");
	//nombre = nombre.split(",");
	name = nombre[0];
	app = nombre[1];
	apm = nombre[2];
	$("#nombre").val(name);
	 $('#nombre').attr("disabled", true);
	$("#app").val(app);
	$("#apm").val(apm);
	 $('#btnEditar').attr("disabled", false);
	
}
function ModificarEmpleado(){

	var nombre = $("#nombre").val();
	var app = $("#app").val();
	var apm = $("#apm").val();
	var fecha = $("#fecha").val();
	var departamento = $("#departamento").val();
	var sueldo = $("#sueldo").val();
	
	if (nombre=="")
	{
		$("#nombre").focus();
		swal("Falta Nombre");
		
	}
	else if (app =="")
	{
		$("#app").focus();
		swal("Falta Apellido Paterno");
	}
	else if (apm == "")
	{
		$("#apm").focus();
		swal("Falta Apellido Materno");
	}
	else if(fecha=="")
	{
		swal("Falta Fecha");
	}
	else if (sueldo==0)
	{
		$("#fecha").focus();
		swal("Falta Sueldo");
	}
	else if (departamento==0)
	{
		$("#departamento").focus();
		swal("Falta Departamento");
	}
	else{
		swal({
	  title: "¿Seguro de Continuar?",
	  text: "se Modificará el registro!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Sí, Modificar!",
	  closeOnConfirm: false
	},
	function(){
		$.ajax({
		url: "./editarEmpleado.php",
		type: "POST",
		data:'Nombre='+nombre+'&ApPaterno='+app+'&ApMaterno='+apm+'&FecNac='+fecha+'&Departamento='+departamento+'&Sueldo='+sueldo+'&id'+ Clave,
		success: function(data){
			swal("Modificado!", "Empleado Modificado", "success")
				 $('#nombre').attr("disabled", false);
				location.reload();
		}
		});
	});	
	}
}
function addToTable() {
	var consecutivo;
	var nombreCompleto= $("#nombre").val() + " " + $("#app").val() + " " + $("#apm").val();
	var fecha = $("#fecha").val();
	var departamento = $("#departamento option:selected").text();
	var sueldo = $("#sueldo").val();
	$.ajax({
			
			url: './getConsecutivo.php',
			type: 'post',
			data: { tag: 'getData'},
			dataType: 'json',
			success: function (data) {
				if (data.success) {
					$.each(data, function (index, record) {
						if ($.isNumeric(index)) { 
							if (record.Nombre == $("#nombre").val())
							{
								consecutivo = record.Clave_Emp;
								var newRow = document.createElement('tr');
							   newRow.appendChild(createCell(consecutivo));
							   newRow.appendChild(createCell(nombreCompleto));
							   newRow.appendChild(createCell(fecha));
							   newRow.appendChild(createCell(departamento));
							   newRow.appendChild(createCell(sueldo));
							   var cellRemoveBtn = createCell();
							   cellRemoveBtn.appendChild(createEditBtn())
							   cellRemoveBtn.appendChild(createRemoveBtn())
							   newRow.appendChild(cellRemoveBtn);
							   document.querySelector('#empleados').appendChild(newRow);
							}
								
						}
					});
				}
			}
		});
   
  
}
function createRemoveBtn() {
	var btnRemove = document.createElement('button');
  btnRemove.id= "btnRemove";
  btnRemove.className = 'boton-elim';
 btnRemove.onclick = eliminarEmpleado;
  btnRemove.innerText = 'Eliminar';
  return btnRemove;
}
function createEditBtn(){
	var btnOk= document.createElement('button');
  btnOk.id="btnEdit";
  btnOk.className = 'boton-edit';
  btnOk.onclick = editarEmpleado;;
  btnOk.innerText = 'Editar';
  return btnOk;
}
function createCell(text) {
	var td = document.createElement('td');
  if(text) {
  	td.innerText = text;
  }
  return td;
}


