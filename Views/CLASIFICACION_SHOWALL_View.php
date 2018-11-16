<?php
class CLASIFICACION_SHOWALL {

	function __construct($array,$volver){
		$this->datos = $array;
		$this->volver = $volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
		/**NO MOSTRAR IDEnfrentamiento y mostrar login1 y login2 de las parejas*/
?>
<div style="overflow-x:auto;">
				<h2><?php  echo 'Tabla ShowAll Enfrentamientos/Grupo:';?>:</h2>
					<?php
						$grupo = null;
						for($j=0;$j<count($this->datos);$j++){
							if($grupo != $this->datos[$j][0]){
								$grupo = $this->datos[$j][0];
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
					?>
					<!--<table class="tablas separador">
						<tr>
						<th>idGrupo</th><th>Login1-P1</th><th>Login2-P1</th><th>Login1-P2</th><th>Login2-P2</th><th>Campeonato</th><th>Grupo</th><th>Categoria</th><th>Set1</th><th>Set2</th><th>Set3</th>
						</tr>-->
						<?php
						
							/*for($j=0;$j<count($this->datos);$j++){
								echo "<tr>";
								for($i=0; $i<11;$i++){
										echo "<td>".$this->datos[$j][$i]."</td>";
									
								}
								echo '</tr>';
								
							}*/
							?>
						
					<!--</table>-->
</div>
<?php		
	include 'Footer.php';
	}
}
?>