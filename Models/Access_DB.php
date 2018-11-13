<?php
//Funcion para conectar con la base de datos
function ConnectDB()
{
	//Nueva conexion 
    $mysqli = new mysqli("", 'root', '' , 'ABP_11');
    	//Si tiene un error lo mostramos
	if ($mysqli->connect_errno) {
		include '../View/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return false;
	}//Si no tiene ningun error devolvemos la conexion
	else{
		return $mysqli;
	}
}

?>