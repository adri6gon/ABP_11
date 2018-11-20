<?php

class CAMPEONATO_EDIT {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Modificar campeonato:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="editCampeonato" id="editCampeonato" action="./CAMPEONATOS_Controller.php?action=EDIT" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>Id: </td>
								<td><input class="form-est" type="text" id="idCampeonato" name="idCampeonato" maxlength="10" value="<? echo $this->datos['idCampeonato']?>" readonly required></td>
							</tr>
							<tr>
								<td>Nombre:</td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="20" maxlength="30" value="<? echo $this->datos['nombre']?>" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Fecha inicio Inscripción:</td>
								<td><input class="form-est" type="date" id="fechaIniInscripcion" name="fechaIniInscripcion" value="<? echo $this->datos['fechaIniInscripcion']?>" required></td>
							</tr>
							<tr>
								<td>Fecha fin Inscripción:</td>
								<td><input class="form-est" type="date" id="fechaFinInscripcion" name="fechaFinInscripcion" value="<? echo $this->datos['fechaFinInscripcion']?>" required></td>
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