<!--
Funcion del archivo: Funcion del ACL, comprobacion de permisos
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php
include_once '../Models/USUARIOS_Model.php';
//Funcion que devuelve un boolean segun tenga el permiso el usuario o no
/*function comprobarPermisos($accion,$funcionalidad){
	//Array de permisos del usuario
	$permisos = $_SESSION['PERMISOS'];
	//Partimos de que no lo tiene
	$band = false;
	//Recorremos todos los permisos 
	for($i=0; $i<count($permisos);$i++){
		//Si coincide con alguno lo tiene
		if($permisos[$i][0] == $accion && $permisos[$i][1] == $funcionalidad){
			$band = true;
		}
	}	
	return $band;
}*/
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