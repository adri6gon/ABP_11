<?php
include_once '../Models/USUARIOS_Model.php';
function comprobarRol($rol){
	$usuario = new USUARIOS_Model($_SESSION['login'],'','','','');
	$rolBD = $usuario->getRol();
	if($rolBD[0] == 'admin'){
		return true;
	}else{
		if($rol == $rolBD[0]){
			return true;
		}else{
			return false;
		}
	}	
}
?>