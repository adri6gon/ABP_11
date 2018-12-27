<?php

class ESCUELA_EDIT {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Modificar escuela:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="editEscuela" id="editEscuela" action="./ESCUELAS_Controller.php?action=EDIT" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>Nombre:</td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="20" maxlength="30" value="<?php echo $this->datos['nombre']?>" onBlur="comprobarTexto(this,this.size)" required>
                                <input type="hidden" id="idEscuela" name="idEscuela" maxlength="10" value="<?php echo $this->datos['idEscuela']?>" readonly required></td>

                            </tr>
							<tr>
								<td>Fecha fudacion:</td>
								<td><input class="form-est" type="date" id="fundacion" name="fundacion" value="<?php echo $this->datos['Fundacion']?>" required></td>
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