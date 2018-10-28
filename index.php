<!--
Funcion del archivo: Pagina de inicio de la web, que redirige a controladores segun la sesion.
Autor: Adrian Gonzalez
Fecha: 23/12/17
-->
<?php
//entrada a la aplicacion

//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include './Functions/Authentication.php';

//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){
	header('Location:./Controllers/Login_Controller.php');
}
//si ha pasado por el login de forma correcta 
else{
	header('Location:./Controllers/Index_Controller.php');
    }
?>


