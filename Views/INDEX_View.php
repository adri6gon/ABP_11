<!--
Funcion del archivo: Vista inicial para usuarios
Autor: j0z5zs 
Fecha: 23/12/17
-->
<?php

class INDEX_View {
	//Funcion constructor
	function __construct(){
		$this->render();
	}
	//Funcion que genera la vista
	function render(){
		include 'Header.php';
		
		echo '<h2>'.$strings['Bienvenido'].'</h2>';
						
	include 'Footer.php';
	}
}
?>