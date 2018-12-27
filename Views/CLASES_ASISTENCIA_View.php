<?php
class CLASES_ASISTENCIA {

	function __construct($lista,$array,$volver,$clase){
		$this->lista = $lista;
		$this->datos = $array;
		$this->volver = $volver;
		$this->idClase = $clase;
		$this->render();
	}

	function render(){
		include 'Header.php';
		
?>

<div style="overflow-x:auto;">
				<h2><?php echo 'Tabla de Asistencia '.$this->idClase.':'; ?></h2>
					
					<table class="tablas separador">
						<tr>
						<?php
						for($i=0; $i<count($this->lista);$i++){
								echo "<th>".$this->lista[$i]."</th>";			
						}
							?>
						
						<form name="asistencia" id="asistencia" action="./CLASES_Controller.php?action=ASISTENCIA"  method="POST" enctype="multipart/form-data">
                            <!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.-->
						<?php
							//$atributos = array('login', 'password', 'DNI', 'nombre', 'apellidos', 'telefono', 'email', 'FechaNacimiento', 'fotopersonal', 'sexo');						
							for($j=0;$j<count($this->datos);$j++){
								echo "<tr><td>".$this->datos[$j][0]."</td><td>";
								
								if($this->datos[$j][1] == 1){
									echo "&nbsp&nbsp<input type='checkbox' name='asistencia[]' value=".$this->datos[$j][0]." checked></td>";
								}else{
									echo "&nbsp&nbsp<input type='checkbox' name='asistencia[]' value=".$this->datos[$j][0]."></td>";
								}
							}
							echo '<input type="hidden" name="idClase" value='.$this->idClase.'>';
							?>
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="insertar" name="insertar" value="Enviar asistencia" ></td>
							</tr>
						</form>
					</table>
</div>
				


<?php		
	include 'Footer.php';
	}
}
?>