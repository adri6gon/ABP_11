<!--
Funcion del archivo: Controlador de la pagina de Login. Crea la vista de login o comprueba si es correcto el usuario y la contraseña y crea la sesion.
Autor: Adrian Gonzalez
Fecha: 23/12/17
-->
<?php
session_start();
//Si no ha enviado el login y la password
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../Views/Login_View.php';
	//Mostramos la vista de login
	$login = new Login();
	
}//Si ha enviado datos
else{
	include '../Models/USUARIOS_Model.php';
	//Creamos un objeto de la clase USUARIOS_Model con los datos pasados
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','');
	//Guardamos la respuesta del login
	$respuesta = $usuario->login();
	//Si es true creamos la sesion de ese usuario
	if ($respuesta == 'true'){
		//Variable login de la sesion corresponde con el login pasado por el usuario
		$_SESSION['login'] = $_REQUEST['login'];
		//Guardamos los permisos del usuario en un array de la sesion
		$_SESSION['PERMISOS'] = $usuario->getRol();
		header('Location:../index.php');
	}//No es correcto el login
	else{
		include '../Views/MESSAGE_View.php';
		new MESSAGE($respuesta, '../Controllers/USUARIOS_Controller.php');
	}

}
?>

