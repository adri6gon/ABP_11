<?php
class MIS_ENFRENTAMIENTO_SHOWALL {

	function __construct($lista,$array,$volver){
		$this->lista = $lista;
		$this->datos = $array;
		$this->volver = $volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<div style="overflow-x:auto;">
				<h2><?php  echo 'Tabla ShowAll Mis Enfrentamientos'; ?>:</h2>
					<table class="tablas separador">
						<tr>
						<?php
						for($i=0; $i<count($this->lista);$i++){
							echo "<th>".$this->lista[$i]."</th>";			
					}
					echo "<th>Acciones</th></tr>";
						for($j=0;$j<count($this->datos);$j++){
							echo "<tr>";
							for($i=0; $i<count($this->lista);$i++){
									echo "<td>".$this->datos[$j][($this->lista)[$i]]."</td>";
								
							}
							echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/busqueda2.png"></a></td></tr>';
							
						}
							?>
						
					</table>
</div>
				


<?php		
	include 'Footer.php';
	}
}
?>