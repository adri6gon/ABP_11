<!--
Funcion del archivo: Controlador del index de la WEB
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php
//Si no esta creada la sesion
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';
//Si no esta autenticado
if (!IsAuthenticated()){
	header('Location:../index.php');
}
include '../Functions/ACL.php';
//Si tiene permisos de usuarios lo redirgimos al showall
if(comprobarPermisos('SHOWALL','USUARIOS')){
	header('Location:./USUARIOS_Controller.php');
}//Si no lo dirigimos a la vista de inicio
else{
		include '../Views/INDEX_View.php';
		new INDEX_VIEW();
}
?>