<!--
Funcion del archivo: Archivo que contiene la vista del add de un usuario
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php

class ADD_USUARIO {
//Constructor
	function __construct($volver,$grupos){
		//Enlace de vuelta atras
		$this->volver=$volver;
		//Grupos a mostrar
		$this->grupos = $grupos;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<h2 style="color:white;margin-top:150px;"><?php echo $strings['Añadir usuario'];?>:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="anadirUser" id="anadirUser" action="./USUARIOS_Controller.php?action=ADD" onChange="validarAnadirUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td><?php echo $strings['Login']; ?>: </td>
								<td><input class="form-est" type="text" id="login" name="login" size="9" maxlength="9" placeholder="<?php echo $strings['Login']; ?>*" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Contrasenha']; ?>:</td>
								<td><input class="form-est" type="password" id="contrasena" name="contrasena" size="20" maxlength="20" placeholder="<?php echo $strings['Contrasenha']; ?>*" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>DNI:</td>
								<td><input class="form-est" type="text" id="dni" name="DNI" size="9" maxlength="9"	 placeholder="DNI*" onBlur="comprobarDNI(this)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Email']; ?>: </td>
								<td><input class="form-est" type="email" id="email" name="email" size="40" maxlength="40" placeholder="<?php echo $strings['Email']; ?>*" onBlur="comprobarEmail(this)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Nombre']; ?>: </td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" placeholder="<?php echo $strings['Nombre']; ?>*" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Apellidos']; ?>: </td>
								<td><input class="form-est" type="text" id="apellidos" name="apellidos" size="50" maxlength="50"placeholder="<?php echo $strings['Apellidos']; ?>*" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Telefono']; ?>: </td>
								<td><input class="form-est" type="text" id="telefono" name="telefono" size="11" maxlength="11" placeholder="<?php echo $strings['Telefono']; ?>*"  onBlur="comprobarTelf(this)" required></td>
							</tr>	
							<tr>
								<td><?php echo $strings['Direccion']; ?>: </td>
								<td><input class="form-est" type="text" id="direccion" name="direccion" size="60" maxlength="60"placeholder="<?php echo $strings['Direccion']; ?>*"  onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Grupos']; ?>: </td>
								 <td><ul>
										<?php 
										//Bucle que muestra los grupos
											for($j=0;$j<count($this->grupos);$j++){
													echo "<li><label><input type='checkbox' name='grupos[]' value='".$this->grupos[$j]['IdGrupo']."'>".$this->grupos[$j]['NombreGrupo']."</label></li>";
											}				
										?>							
								 </ul>
							</td>
							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="insertar" name="insertar" value="Insertar" disabled></td>
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