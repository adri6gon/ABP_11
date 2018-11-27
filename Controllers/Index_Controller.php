<?php
//Si no esta creada la sesion
if(!isset($_SESSION)){
    session_start();
}

include_once '../Functions/Authentication.php';
include_once '../Models/NOTICIAS_Model.php';
include_once '../Models/PARTIDOS_Model.php';
include '../Functions/ACL.php';
//Si tiene permisos de usuarios lo redirgimos al showall
if(comprobarRol('admin')){
	header('Location:./USUARIOS_Controller.php');
}//Si no lo dirigimos a la vista de inicio
else{
		$NOTICIAS = new NOTICIAS_Model('','', '','');
		$datosNoticias = $NOTICIAS->_SHOWALL();
	    $listaNoticias = array('imageURL','enlace', 'texto');
		include '../Views/NOTICIA_INDEX_View.php';


		$PARTIDOS = new PARTIDOS_Model('','', '', '','','');
		
		// if(isset($_SESSION['login'])){
		// 	$partidos = $PARTIDOS->_SHOWALLPROMOWITHLOGIN();
		// }else {
		// 	$partidos = $PARTIDOS->_SHOWALLPROMOWITHOUTLOGIN();
		// }

		$partidos = $PARTIDOS->_SHOWALLPROMOWITHOUTLOGIN();

		$numInscritos = $PARTIDOS->_COUNTINSCRITOS();

		$selectUser = $PARTIDOS->_SELECTUSER();

		//var_dump($numInscritos);
		new NOTICIA_INDEX_VIEW($datosNoticias,$listaNoticias, $partidos, $numInscritos, $selectUser);




}



?>