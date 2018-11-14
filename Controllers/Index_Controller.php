<?php
//Si no esta creada la sesion
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';
include_once '../Models/NOTICIAS_Model.php';
include '../Functions/ACL.php';
//Si tiene permisos de usuarios lo redirgimos al showall
if(comprobarRol('admin')){
	header('Location:./USUARIOS_Controller.php');
}//Si no lo dirigimos a la vista de inicio
else{
		$NOTICIAS = new NOTICIAS_Model('','', '', '');
		$datos = $NOTICIAS->_SHOWALL();
	    $lista = array('imageURL','enlace', 'texto');
		include '../Views/NOTICIA_INDEX_View.php';
		new NOTICIA_INDEX_VIEW($datos, $lista);
}
?>