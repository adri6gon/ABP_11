<?php

class CLASIFICACION_PLAYOFF{

	function __construct($array,$parejas,$volver){
		$this->datos = $array;
		$this->parejas = $parejas;
		$this->volver = $volver;
		//$this->arg = $arg;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Cruces del Grupo <?php echo "".$this->datos[($this->lista)[0]]."" ?> :</h2>

				<?php
				var_dump($this->datos);

				var_dump($this->parejas);
					if($this->admin){
				?>			
				<table class="tablas"><tr><th>
				<p>Generar grupos 
					<?php
					echo '<a href="CLASIFICACION_Controller.php?action=PLAYOFF&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'&'.($this->lista)[3].'='.$this->datos[$j][($this->lista)[3]].'"><img src="../Views/images/playoff.png" width="30" size"30" title="Generar" alt="Generar"></a>';
					?>	
					</p></th></tr>
			</table>
						<?php
					}
					echo "IF, si generados cuadro, si no boton";
						?>

				<table>

					<?php	

						echo "<th>Cuartos</th>";

						for($i=0;$i<4;$i++){
							echo "<tr><td>Pareja1 -/-/- vs Pareja2 -/-/- </td></tr>";
						}
						echo "<th>Semifinales</th>";
						for($i=0;$i<2;$i++){
							echo "<tr><td>Pareja1 -/-/- vs Pareja2 -/-/- </td></tr>";
						}
						echo "<th>Final</th>";
						echo "<tr><td>Pareja1 -/-/- vs Pareja2 -/-/- </td></tr>";
						echo "<th>Ganador</th>";
						echo "<tr><td>Pareja1</tr>";

						?>
					
				</table>
						
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>