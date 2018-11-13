<?php

class INDEX_View {
	//Funcion constructor
	function __construct(){
		$this->render();
	}
	//Funcion que genera la vista
	function render(){
		include 'Header.php';
		
		echo '<h2>Bienvenido</h2>';
						
	include 'Footer.php';
	}
}
?>