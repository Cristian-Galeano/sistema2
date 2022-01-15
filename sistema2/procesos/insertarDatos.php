<?php

	require_once "../crud/crud.php";

	$datos = array(
	 	'nombre' => $_POST['nombre'],
		'estado' => $_POST['estado']
	);

	echo Crud::insertarDatos($datos);

?>

