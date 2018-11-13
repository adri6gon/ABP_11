<?php

class MODIFY_USER {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Modificar usuario:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="editUser" id="editUser" action="./USUARIOS_Controller.php?action=EDIT" onChange="validarEditarUser()" onLoad="validarEditarUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>Login: </td>
								<td><input class="form-est" type="text" id="login" name="login" size="9" maxlength="9" placeholder="Login*" value="<? echo $this->datos['login']?>" onBlur="comprobarTexto(this,this.size)" required readonly></td>
							</tr>
							<tr>
								<td>Contraseña:</td>
								<td><input class="form-est" type="password" id="contrasena" name="contrasena" size="20" maxlength="20" placeholder="Contraseña*" value="<? echo $this->datos['password']?>" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Rol: </td>
								<td><input class="form-est" type="text" id="text" name="rol" size="40" maxlength="40" placeholder="Rol*" value="<? echo $this->datos['rol']?>" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Nombre: </td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" placeholder="Nombre*" value="<? echo $this->datos['nombre']?>" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Apellidos: </td>
								<td><input class="form-est" type="text" id="apellidos" name="apellidos" size="50" maxlength="50"placeholder="Apellidos*" value="<? echo $this->datos['apellidos']?>" onBlur="comprobarAlfabetico(this,this.size)" required></td>
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