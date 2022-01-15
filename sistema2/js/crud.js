function mostrar(){
	$.ajax({
		type:"POST",
		url:"procesos/mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r); 
			
		}
	});
}
 
function obtenerDatos(id){
	$.ajax({
		type:"POST",
		data: "id=" + id,
		url:"procesos/obtenerDatos.php",
		success:function(r){

			r= jQuery.parseJSON(r);
			$('#frminsertu').find('input[name="id"]').val(r['id']);
			$('#frminsertu').find('input[name="nombreu"]').val(r['nombre']);
			$('#frminsertu').find('input[name="estadou"]').val(r['estado']);

			/*$('#id').val(r['id']);
			$('#nombreu').val(r['nombre']);
			$('#estadou').val(r['estado']);*/

		}
	});

}
function actualizarDatos(){
	
	$.ajax({

		type:"POST",
		url:"procesos/actualizarDatos.php",
		data:$('#frminsertu').serialize(),
		success:function(r) {

		console.log(r);

mostrar();
			swal("Registro actualizado con exito!", "success");

		}, error:function(r){
			swal("Error!", "error");
		}
	});


	return false;
}


function eliminarDatos(id){
	swal({
		title: "¿Estas seguro de eliminar este registro?",
		text: "!Una vez eliminado no podra recuperarse¡",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

			$.ajax({
				type:"POST",
				url:"procesos/eliminarDatos.php",
				data:"id=" + id,
				success:function(r){

					if (r==1) {
					
						mostrar();
						swal("Registro eliminado con exito!", ":D", "info");
					}else{
						swal("Error!", "error");
					}
				}
			});	
		} 
	});
}

function insertarDatos(){
	$.ajax({
		type:"POST",
		url:"procesos/insertarDatos.php",
		data:$('#frminsert').serialize(),
		success:function(r){

			if (r==1) {
				$('#frminsert')[0].reset();  // LIMPIAR FORMULARIO
				mostrar();
				swal("Registro agregado con exito!", "success");
			}else{
				swal("Error!", "error");
			}
		}
	});

	return false;
}
