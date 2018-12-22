<?php

class ADD_CLASE {
//Constructor
	function __construct($escuelas,$volver){
		$this->escuelas = $escuelas;
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Añadir clase:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="anadirClase" id="anadirClase" action="./CLASES_Controller.php?action=ADD"  method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
						 	<tr>
							 <td>Escuela:</td>
							 <td><select id="escuela" name="idEscuela">
							 <?
									for($i=0;$i<count($this->escuelas);$i++){
											echo "<option value=".$this->escuelas[$i][0].">".$this->escuelas[$i][1]."</option>";
									}
								?>
								</select>
							</td>
							 <tr>
							<tr>
								<td>Fecha:</td>
								<td><input class="form-est" type="date" id="fecha" name="fecha" required></td>
							</tr>
							<tr>
								<td>Hora:</td>
								<td><input class="form-est" type="time" id="hora" name="hora" required></td>
							</tr>
							<tr>
								<td>Capacidad:</td>
								<td><input class="form-est" type="text" id="capacidadAlumnos" name="capacidadAlumnos" required></td>
							</tr>
							<tr>
								<td>Entrenador:</td>
								<td><input class="form-est" type="text" id="entrenador" name="entrenador" required></td>
							</tr>	
							<tr>
								<td>IdPista:</td>
								<td><input class="form-est" type="text" id="idPista" name="idPista" required></td>
							</tr>	
							<tr>
								<td>Nombre pista:</td>
								<td><input class="form-est" type="text" id="nombrePista" name="Pistanombre" required></td>
							</tr>			
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="insertar" name="insertar" value="Insertar" ></td>
							</tr>
						 </table>
						 <p><a href="<?php echo $this->volver; ?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
					</form>
				</div>


<?php		
	include 'Footer.php';
	}
}
?>