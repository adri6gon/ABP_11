<?php

class SEARCH_CLASE {

	function __construct($volver){
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Buscar clase:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchClase" id="searchClase" action="./CLASES_Controller.php?action=SEARCH" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
						<tr>
								<td>ID Clase: </td>
								<td><input class="form-est" type="text" id="idClase" name="idClase" maxlength="10"  ></td>
							</tr>
							<tr>
								<td>ID Escuela: </td>
								<td><input class="form-est" type="text" id="idEscuela" name="idEscuela" maxlength="10" ></td>
							</tr>
							<tr>
								<td>Fecha:</td>
								<td><input class="form-est" type="date" id="fecha" name="fecha" ></td>
							</tr>
							<tr>
								<td>Hora:</td>
								<td><input class="form-est" type="time" id="hora" name="hora" ></td>
							</tr>	
							<tr>
								<td>Capacidad de alumnos:</td>
								<td><input class="form-est" type="number" id="capacidadAlumnos" name="capacidadAlumnos" ></td>
							</tr>	
							<tr>
								<td>PistaID:</td>
								<td><input class="form-est" type="text" id="idPista" name="idPista" ></td>
							</tr>
							<tr>
								<td>Nombre de la pista:</td>
								<td><input class="form-est" type="text" id="Pistanombre" name="Pistanombre" ></td>
							</tr>
							<tr>
								<td>Entrenador:</td>
								<td><input class="form-est" type="text" id="entrenador" name="entrenador" ></td>
							</tr>							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="buscar" name="buscar" value="Buscar"></td>
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