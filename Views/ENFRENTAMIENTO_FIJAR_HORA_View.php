<?php

class HORA_ENFRENTAMIENTO {

	function __construct($volver,$enfrentamiento){
		$this->volver=$volver;
		$this->enfrentamiento = $enfrentamiento;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Introducir hora y fecha:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="fechaHora" id="fechaHora" action="./ENFRENTAMIENTOS_Controller.php?action=PROPONER-HORA" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="idEnfrentamiento" id="idEnfrentamiento" value="<? echo $this->enfrentamiento; ?>">
						 <table>
							<tr>
								<td>Hora: </td>
								<td><input class="form-est" type="time" id="hora" name="hora" size="9" maxlength="9" value="<? echo $this->datos['idEnfrentamiento']?>" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Fecha:</td>
								<td><input class="form-est" type="date" id="fecha" name="fecha" size="20" maxlength="20" value="<? echo $this->datos['idPareja1']?>" onBlur="comprobarTexto(this,this.size)" required></td>
							
							</tr>
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="insertar" name="insertar" value="Insertar"></td>
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