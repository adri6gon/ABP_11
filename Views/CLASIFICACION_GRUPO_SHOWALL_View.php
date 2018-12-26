<?php

class CLASIFICACION_GRUPO_SHOWALL {

	function __construct($array,$volver){
		$this->datos = $array;
		$this->volver = $volver;
		//$this->lista = $lista;	
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Clasificacion del Grupo:</h2>
				<table class="tablas">
					<?php	

							for($i = 0; $i < count($this->datos);$i++){
								echo "<tr><th>"."</p>\n".$this->datos[$i][1].'-'.$this->datos[$i][2]."</th>";

								echo "<td>"."&nbsp".$this->datos[$i][3]." puntos</td></tr>";

							}
					?>
				</table>
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>