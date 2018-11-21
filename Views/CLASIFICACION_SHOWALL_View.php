<?php
class CLASIFICACION_SHOWALL {

	function __construct($array,$volver){
		$this->datos = $array;
		$this->volver = $volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<div style="overflow-x:auto;">
				<h2><?php  echo 'Tabla ShowAll Enfrentamientos/Grupo:';?></h2>
					<?php

					if($this->datos){
						$grupo = null;
						for($j=0;$j<count($this->datos);$j++){
							var_dump(count($this->datos));
							if($grupo != $this->datos[$j][0]){
								$grupo = $this->datos[$j][0];
								echo '<h3>Grupo '.$grupo.':</h3>';
								//Mostrar clasificación de este grupo:
								echo '<a href="'.$_SERVER['PHP_SELF'].'?action=CLASIFICACION&idGrupo='.$this->datos[$j][0].'&idCategoria='.$this->datos[$j][13].'&idCampeonato='.$this->datos[$j][14].'">Ver clasificación de este grupo</a>';
								echo "<table><tr>";
								echo '<tr>
								<th>Login1-P1</th><th>Login2-P1</th><th>Login1-P2</th><th>Login2-P2</th><th>Campeonato</th><th>Grupo</th><th>Categoria</th><th>Set1</th><th>Set2</th><th>Set3</th>
								</tr>';
							}else{
								echo "<tr>";
							}
							for($i=1; $i<11;$i++){
									echo "<td>".$this->datos[$j][$i]."</td>";
								
							}
							if($grupo != $this->datos[$j][0]){
								echo '</tr></table>';
								$grupo = $this->datos[$j][0];
							}else{
								echo "</tr>";
							}
							
						}
						echo '</table>';

						}else{
							echo " &nbsp;&nbsp;No hay grupos asignados a esta categoría todavía.";
						}
					?>
					<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
</div>
<?php		
	include 'Footer.php';
	}
}
?>