<?php

class RESULTADO_ENFRENTAMIENTO {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Introducir resultado:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="resultado" id="resultadoEnfren" action="./ENFRENTAMIENTOS_Controller.php?action=RESULTADO" onChange="validarEditarUser()" onLoad="validarEditarUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>IdEnfrentamiento: </td>
								<td><input class="form-est" type="text" id="idEnfrentamiento" name="idEnfrentamiento" size="9" maxlength="9" placeholder="IdEnfrentamiento*" value="<? echo $this->datos['idEnfrentamiento']?>" onBlur="comprobarTexto(this,this.size)" required readonly></td>
							</tr>
							<tr>
								<td>Pareja1:</td>
								<td><input class="form-est" type="text" id="pareja1" name="pareja1" size="20" maxlength="20" placeholder="Pareja1" value="<? echo $this->datos['idPareja1']?>" onBlur="comprobarTexto(this,this.size)" required readonly></td>
							</tr>
							<tr>
								<td>Pareja2: </td>
								<td><input class="form-est" type="text" id="pareja2" name="pareja2" size="20" maxlength="20" placeholder="Pareja2" value="<? echo $this->datos['idPareja2']?>" onBlur="comprobarTexto(this,this.size)" required readonly></td>
							</tr>
							<tr>
								<td>Set1: </td>
								<td><input class="form-est" type="text" id="set1" name="set1" size="10" maxlength="10" placeholder="Set1" value="<? echo $this->datos['set1']?>" onBlur="comprobarTexto(this,this.size)"></td>
							</tr>
							<tr>
								<td>Set2: </td>
								<td><input class="form-est" type="text" id="set2" name="set2" size="10" maxlength="10"placeholder="Set2" value="<? echo $this->datos['set2']?>" onBlur="comprobarTexto(this,this.size)"></td>
							</tr>	
							 <tr>
								<td>Set3: </td>
								<td><input class="form-est" type="text" id="set3" name="set3" size="10" maxlength="10"placeholder="Set3" value="<? echo $this->datos['set3']?>" onBlur="comprobarTexto(this,this.size)"></td>
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