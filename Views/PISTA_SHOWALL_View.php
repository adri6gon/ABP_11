<?php
class PISTA_SHOWALL {

	function __construct($lista,$pistas,$array,$volver){
		$this->lista = $lista;
		$this->pistas = $pistas;
		$this->datos = $array;
		$this->volver = $volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
		
?>
<div style="overflow-x:auto;">
				<h2>Pistas disponibles:</h2>
	<?php		
	echo '<a href="'.$_SERVER['PHP_SELF'].'?action=PREVDAY&fecha='.$this->datos[0]['fecha'].'">Anterior</a>&nbsp';
	 echo '<a href="'.$_SERVER['PHP_SELF'].'?action=NEXTDAY&fecha='.$this->datos[0]['fecha'].'">Siguiente</a>';
		?>
		<table class="tablas separador">
						<tr>
						<?php
		//FALTA FILTRAR POR DIA Y PODER RECARGAR LA PAGINA CON LAS DE LOS DIAS SIGUIENTES
		//FALTA PONER EL BOTON EN EL DIV PARA PODER REDIRIGIR AL SHOWCURRENT
						//var_dump($this->datos);
						for($j=0;$j<count($this->pistas);$j++){
							echo "<tr><th>".$this->pistas[$j]['nombre']."</th>";
							for($i=0; $i<count($this->datos);$i++){
								if($this->datos[$i]['nombre'] == $this->pistas[$j]['nombre']){
									if($this->datos[$i]['restriccion']){
										echo "<td style='background-color: coral;'>";
									}else{
										//echo "<a href=".$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'.($this->lista)[0].'='.$this->datos[$i]['idPista'].'"><td style="background-color: green;">"'.$this->datos[$i]["hora"].'"</td></a>";
										echo "<td style='background-color: green;'>";
									}
									echo "<a href=".$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'.($this->lista)[0].'='.$this->datos[$i]["idPista"].'>'.$this->datos[$i]["hora"]."</a></td>";
								}
							}
							echo "</tr>";
						}
							?>	
					</table>
					<?php
								 echo "<p align='center'><a href=".$this->volver."><img src='../Views/images/atras.png' title='Atrás' alt='Atrás'></a></p>";
						
					?>
</div>
				


<?php		
	include 'Footer.php';
	}
}
?>