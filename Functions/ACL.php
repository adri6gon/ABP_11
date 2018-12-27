<?php
include_once '../Models/USUARIOS_Model.php';
function comprobarRol($rol){
	
	$usuario = new USUARIOS_Model($_SESSION['login'],'','','','');
	$rolBD = $usuario->getRol();
	if($rol == $rolBD[0]){
		return true;
	}else{
		if(($rolBD[0]=='entrenador' || $rolBD[0]=='admin') && $rol=='deportista'){
			return true;
		}else{
				return false;
			}
		}	
		
}
?>