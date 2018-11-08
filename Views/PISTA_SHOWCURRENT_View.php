<?php

class PISTA_SHOWCURRENT {

	function __construct($array,$volver,$lista){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla en detalle de hora/pista:</h2>
				<table class="tablas">
					<?php	
							for($j=0;$j<count($this->lista);$j++){
								echo "<tr>";						
									echo "<th>".($this->lista)[$j]."</th><td><a href='".$this->datos[($this->lista)[$j]]."' target='_blank'>".$this->datos[($this->lista)[$j]]."</a></td>";
								echo "<tr>";
							}
							if(!$this->datos['restriccion']){
								
								//Feito para reservar un usuario, non para que reserve un admin por un usuario!
								echo "<a href=".$_SERVER['PHP_SELF'].'?action=RESERVE&'.($this->lista)[0].'='.$this->datos["idPista"].'&'.($this->lista)[2].'='.$this->datos["nombre"].'>Reservar pista</a>';
							}
					?>
				</table>
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>