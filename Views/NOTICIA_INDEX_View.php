<?php

class NOTICIA_INDEX_View {
//Constructor
	function __construct($datos, $lista){
		//Enlace de vuelta atras
		$this->datos=$datos;
		$this->lista = $lista;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<section class="noticias" style="margin-top:80px;">
	<?php
		for($j=0;$j<count($this->datos);$j++){
			
			 echo '<div class="noticia" style="background-color:#FFFFFF; margin-top:15px;">
			 		<img src="'.$this->datos[$j][($this->lista)[0]].'"><br>';
			 echo '<a href="'.$this->datos[$j][($this->lista)[1]].'">Enlace<a><br>';	
			 echo '<p>'.$this->datos[$j][($this->lista)[2]].'</p>';
			 echo '</div>';						
					 
		}
	?>
</section>

<?php		
	include 'Footer.php';
	}
}
?>