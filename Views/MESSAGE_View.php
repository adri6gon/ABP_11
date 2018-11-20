<?php

class MESSAGE {
	//Constructor de la clase
	function __construct($res,$volver){
		//Mensaje a mostrar
		$this->respuesta = $res;
		//Enlace de vuelta atras
		$this->volver = $volver;
		//Llamada a la vista
		$this->render();
		
	}
	//Funcion de la vista
	function render(){
		include 'Header.php';

?>
				<div>
					<h3 style="<?php //Si no esta autenticado
					if(!IsAuthenticated()){ echo 'color:white;margin-top:150px;';} ?>"><?php echo $this->respuesta ?></h3>
					<p><a href="<?php echo $this->volver; ?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
				</div>


<?php		
	include 'Footer.php';
	}
}
?>