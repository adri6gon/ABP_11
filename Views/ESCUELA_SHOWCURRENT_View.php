<?php

class ESCUELA_SHOWCURRENT {

	function __construct($array,$volver,$lista){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla en detalle de Escuela:</h2>
				<table class="tablas">
					<?php	
							for($j=1;$j<count($this->lista);$j++){
								echo "<tr>";
									echo "<th>".($this->lista)[$j]."</th><td>".$this->datos[($this->lista)[$j]]."</td>";
								echo "<tr>";
							}
					?>
				</table>
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>