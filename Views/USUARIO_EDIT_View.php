<!--
Funcion del archivo: Archivo que contiene la vista de edit de USUARIO
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php

class MODIFY_USER {

	function __construct($valores,$volver,$gruposAsig,$grupos){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->gruposAsig = $gruposAsig;
		$this->grupos = $grupos;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;margin-top:150px;"><?php echo $strings['Modificar usuario'];?>:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="editUser" id="editUser" action="./USUARIOS_Controller.php?action=EDIT" onChange="validarEditarUser()" onLoad="validarEditarUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td><?php echo $strings['Login']; ?>: </td>
								<td><input class="form-est" type="text" id="login" name="login" size="9" maxlength="9" placeholder="<?php echo $strings['Login']; ?>*" value="<?php echo $this->datos['login']?>" onBlur="comprobarTexto(this,this.size)" required readonly></td>
							</tr>
							<tr>
								<td><?php echo $strings['Contrasenha']; ?>:</td>
								<td><input class="form-est" type="password" id="contrasena" name="contrasena" size="20" maxlength="20" placeholder="<?php echo $strings['Contrasenha']; ?>*" value="<?php echo $this->datos['password']?>" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>DNI:</td>
								<td><input class="form-est" type="text" id="dni" name="DNI" size="9" maxlength="9"	 placeholder="DNI*" onBlur="comprobarDNI(this)" value="<?php echo $this->datos['DNI']?>" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Email']; ?>: </td>
								<td><input class="form-est" type="email" id="email" name="email" size="40" maxlength="40" placeholder="<?php echo $strings['Email']; ?>*" value="<?php echo $this->datos['Correo']?>" onBlur="comprobarEmail(this)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Nombre']; ?>: </td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" placeholder="<?php echo $strings['Nombre']; ?>*" value="<?php echo $this->datos['Nombre']?>" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Apellidos']; ?>: </td>
								<td><input class="form-est" type="text" id="apellidos" name="apellidos" size="50" maxlength="50"placeholder="<?php echo $strings['Apellidos']; ?>*" value="<?php echo $this->datos['Apellidos']?>" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td><?php echo $strings['Telefono']; ?>: </td>
								<td><input class="form-est" type="text" id="telefono" name="telefono" size="11" maxlength="11" placeholder="<?php echo $strings['Telefono']; ?>*" value="<?php echo $this->datos['Telefono']?>" onBlur="comprobarTelf(this)" required></td>
							</tr>	
							<tr>
								<td><?php echo $strings['Direccion']; ?>: </td>
								<td><input class="form-est" type="text" id="direccion" name="direccion" size="60" maxlength="60"placeholder="<?php echo $strings['Direccion']; ?>*" value="<?php echo $this->datos['Direccion']?>" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
                                <!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.-->
								<td><?php echo $strings['Grupos']; ?>: </td>
								 <td><ul>
										<?php 
											$band = false;
											for($j=0;$j<count($this->grupos);$j++){
												for($i=0; $i<count($this->gruposAsig);$i++){
													if((($this->grupos)[$j])['IdGrupo'] == ($this->gruposAsig)[$i]){
														$band = true;
													}
												}
												if($band){
													echo "<li><label><input type='checkbox' name='grupos[]' value='".$this->grupos[$j]['IdGrupo']."'checked>".($this->grupos[$j])['NombreGrupo']."</label></li>";
												}
												else{
													echo "<li><label><input type='checkbox' name='grupos[]' value='".$this->grupos[$j]['IdGrupo']."'>".($this->grupos[$j])['NombreGrupo']."</label></li>";

												}
												$band = false;
											}				
										?>							
								 </ul>
							</td>
							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="editar" name="editar" value="Editar" disabled></td>
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