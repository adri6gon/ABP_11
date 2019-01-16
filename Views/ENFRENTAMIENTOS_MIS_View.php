<?php
class MIS_ENFRENTAMIENTO_SHOWALL {

	function __construct($lista,$array,$volver,$enfrentamientosRonda,$lista2){
		$this->lista = $lista;
		$this->datos = $array;
		$this->volver = $volver;
		$this->enfRonda = $enfrentamientosRonda;
		$this->lista2 = $lista2;
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
					<br>
					<br>
					<h2><?php  if($this->enfRonda!=null){ echo 'Mis Enfrentamientos en rondas posteriores(NO GRUPOS)'; ?>:</h2>
					<table class="tablas separador">
						<tr>
						<?php
						for($i=0; $i<count($this->lista2);$i++){
							echo "<th>".$this->lista2[$i]."</th>";			
					}
					echo "<th>Acciones</th></tr>";
						for($j=0;$j<count($this->enfRonda);$j++){
							echo "<tr>";
							for($i=0; $i<count($this->lista2);$i++){
									echo "<td>".$this->enfRonda[$j][($this->lista2)[$i]]."</td>";
								
							}
							//CLASIFICACION_Controller.php?action=SHOWCURRENT&idEnfrentamientoRonda=0%20CUA%200&idCategoria=0&idCampeonato=3
							echo '<td><a href="CLASIFICACION_Controller.php?action=SHOWCURRENT&idEnfrentamientoRonda='.$this->enfRonda[$j][($this->lista2)[0]].'&idCategoria='.$this->enfRonda[$j]['idCategoria'].'&idCampeonato='.$this->enfRonda[$j]['idCampeonato'].'"><img src="../Views/images/busqueda2.png"></a></td></tr>';
							
						}
					}
							?>
						
					</table>
</div>
				


<?php		
	include 'Footer.php';
	}
}
?>