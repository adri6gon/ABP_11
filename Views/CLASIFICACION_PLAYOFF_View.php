<?php

class CLASIFICACION_PLAYOFF{

	function __construct($array,$parejas,$cruces,$semis,$final,$volver){
		$this->datos = $array;
		$this->parejas = $parejas;
		$this->cruces = $cruces;
		$this->semis = $semis;
		$this->final = $final;
		$this->volver = $volver;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Cruces de la Categoria:</h2>


				<table>

					<?php	
					
						echo "<th>Cuartos</th>";

						for($i=0;$i<4;$i++){
							//echo "<tr><td>Pareja1 -/-/- vs Pareja2 -/-/- </td></tr>";
							echo "<tr><td> <b>".$this->cruces[$i][1]."-".$this->cruces[$i][2]."</b> vs <b>".$this->cruces[$i][3]."-".$this->cruces[$i][4]."</b> -- [".$this->cruces[$i][7]." / ".$this->cruces[$i][8]." / ".$this->cruces[$i][9]."]  "."";
							echo '<a href="'.$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'."idEnfrentamientoRonda=".($this->cruces)[$i][0].'&'."idCategoria=".($this->cruces)[$i][13].'&'."idCampeonato=".($this->cruces)[$i][12].'"><img src="../Views/images/busqueda2.png"></a></td></tr>';
						}
						
						echo "<th>Semifinales</th>";
						for($i=0;$i<2;$i++){
							//echo "<tr><td>Pareja1 -/-/- vs Pareja2 -/-/- </td></tr>";
							echo "<tr><td> <b>".$this->semis[$i][1]."-".$this->semis[$i][2]."</b> vs <b>".$this->semis[$i][3]."-".$this->semis[$i][4]."</b> -- [".$this->semis[$i][7]." / ".$this->semis[$i][8]." / ".$this->semis[$i][9]."]  "." ";
							echo '<a href="'.$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'."idEnfrentamientoRonda=".($this->semis)[$i][0].'&'."idCategoria=".($this->semis)[$i][13].'&'."idCampeonato=".($this->semis)[$i][12].'"><img src="../Views/images/busqueda2.png"></a></td></tr>';
						}

						
						echo "<th>Final</th>";
						for($i=0;$i<1;$i++){
							//echo "<tr><td>Pareja1 -/-/- vs Pareja2 -/-/- </td></tr>";
							echo "<tr><td> <b>".$this->final[$i][1]."-".$this->final[$i][2]."</b> vs <b>".$this->final[$i][3]."-".$this->final[$i][4]."</b> -- [".$this->final[$i][7]." / ".$this->final[$i][8]." / ".$this->final[$i][9]."]  "."";
							echo '<a href="'.$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'."idEnfrentamientoRonda=".($this->final)[$i][0].'&'."idCategoria=".($this->final)[$i][13].'&'."idCampeonato=".($this->final)[$i][12].'"><img src="../Views/images/busqueda2.png"></a></td></tr>';
						}
						/*
						echo "<th>Ganador</th>";
						//echo "<tr><td>Pareja1</tr>";
						//echo "<tr><td>Pareja1 -/-/- vs Pareja2 -/-/- </td></tr>";
							echo "<tr><td> <b>".$this->parejas[$i][1]."-".$this->parejas[$i][2]."</b>"."</td></tr>";
							$i++;
						*/
						
						?>
					
				</table>
						
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>