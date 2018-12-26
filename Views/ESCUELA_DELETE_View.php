<?php

class ESCUELA_DELETE {

	function __construct($array,$volver,$lista){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla de borrado de escuela:</h2>
				<table class="tablas">
					<?php
							for($j=0;$j<count($this->lista);$j++){

									echo "<th>".($this->lista)[$j]."</th><td>".$this->datos[($this->lista)[$j]]."</td>";
								
								echo "<tr>";
							}
					?>
				</table>
				<p><a href="<?php echo $this->volver; ?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=DELETE&borrar=true&<?php echo ($this->lista)[0];?>=<?php echo $this->datos[($this->lista)[0]];?>"><img src="../Views/images/borrar3.png" title="Borrar" alt="Borrar"></a></p>
<?php
						
	include 'Footer.php';
	}
}
?>