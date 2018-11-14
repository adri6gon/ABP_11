<?php
class RESERVA_SHOWALL {

	function __construct($array,$lista,$volver){
		$this->lista = $lista;
		$this->datos = $array;
		$this->volver = $volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
		
?>
<div style="overflow-x:auto;">
				<h2>Reservas:</h2>
					<table class="tablas separador">
						<tr>
						<?php
						for($i=0; $i<count($this->lista);$i++){
								echo "<th>".$this->lista[$i]."</th>";			
						}
						echo "<th>Acciones</th></tr>";
							?>
						
						
                            <!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.-->
						<?php
							//$atributos = array('login', 'password', 'DNI', 'nombre', 'apellidos', 'telefono', 'email', 'FechaNacimiento', 'fotopersonal', 'sexo');
							for($j=0;$j<count($this->datos);$j++){
								echo "<tr>";
								for($i=0; $i<count($this->lista);$i++){
										echo "<td>".$this->datos[$j][($this->lista)[$i]]."</td>";
									
								}
								echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=DEL_RESERVA&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'&idPista='.$this->datos[$j]['idPista'].'"><img src="../Views/images/borrar.png"></a></tr>';
								
							}
							?>
						
					</table>
</div>
				


<?php		
	include 'Footer.php';
	}
}
?>