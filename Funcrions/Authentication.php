<!--
Funcion del archivo: Archivo que contiene la funcion que comprueba si esta autenticado o no en la web.
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php
//Funcion que devuelve un boolean si esta o no logeado
function IsAuthenticated(){
	//Esta en la sesion guardado el login, entonces esta logeado
	if (!isset($_SESSION['login'])){
		return false;
	}
	else{
		return true;
	}
}
?>

