<!--
Funcion del archivo: Archivo que contiene la vista del busqueda de un usuario
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php

class SEARCH_USUARIO {

	function __construct($volver){
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Buscar usuario:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchUser" id="searchUser" action="./USUARIOS_Controller.php?action=SEARCH" onChange="validarBusquedaUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
							<tr>
								<td>Login: </td>
								<td><input class="form-est" type="text" id="login" name="login" size="9" maxlength="9" placeholder="Login" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>Contraseña:</td>
								<td><input class="form-est" type="password" id="contrasena" name="contrasena" size="20" maxlength="20" placeholder="Contraseña." onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>Rol:</td>
								<td><input class="form-est" type="text" id="rol" name="rol" size="40" maxlength="40" placeholder="Rol*" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>Nombre: </td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" placeholder="Nombre*" onBlur="comprobarAlfabeticoSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>Apellidos: </td>
								<td><input class="form-est" type="text" id="apellidos" name="apellidos" size="50" maxlength="50"placeholder="Apellidos*" onBlur="comprobarAlfabeticoSearch(this,this.size)"></td>
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