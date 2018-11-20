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

