<?php

class CLASE_EDIT {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Modificar clase:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="editClase" id="editClase" action="./CLASES_Controller.php?action=EDIT" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
						 	<tr>
								<td>ID Clase: </td>
								<td><input class="form-est" type="text" id="idClase" name="idClase" maxlength="10" value="<?php echo $this->datos['idClase']?>" readonly required></td>
							</tr>
							<tr>
								<td>IdEscuela: </td>
								<td><input class="form-est" type="text" id="idEscuela" name="idEscuela" maxlength="10" value="<?php echo $this->datos['idEscuela']?>" readonly required></td>
							</tr>
							<tr>
								<td>Fecha:</td>
								<td><input class="form-est" type="date" id="fecha" name="fecha" value="<?php echo $this->datos['fecha']?>" required></td>
							</tr>
							<tr>
								<td>Hora:</td>
								<td><input class="form-est" type="time" id="hora" name="hora" value="<?php echo $this->datos['hora']?>" required></td>
							</tr>	
							<tr>
								<td>Capacidad de alumnos:</td>
								<td><input class="form-est" type="number" id="capacidadAlumnos" name="capacidadAlumnos" value="<?php echo $this->datos['capacidadAlumnos']?>" required></td>
							</tr>	
							<tr>
								<td>PistaID:</td>
								<td><input class="form-est" type="text" id="idPista" name="idPista" value="<?php echo $this->datos['idPista']?>" required></td>
							</tr>
							<tr>
								<td>Entrenador:</td>
								<td><input class="form-est" type="text" id="entrenador" name="entrenador" value="<?php echo $this->datos['entrenador']?>" required></td>
							</tr>						
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="editar" name="editar" value="Editar"></td>
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