<?php

	require_once "../crud/crud.php";

	$datos = array(
	 	'nombre' => $_POST['nombreu'],
		'estado' => $_POST['estadou'],
		'id'=> $_POST['id']
	);

	echo Crud::actualizarDatos($datos);

?>


