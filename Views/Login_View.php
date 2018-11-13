<!--
Funcion del archivo: Vista contenedora del formulario de login a la web.
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php

	class Login{
		//Constructor de la clase
		function __construct(){	
			$this->render();
		}
		//Funcin de la vista
		function render(){

			include 'Header.php'; 
?>
			<body>
				<div id="form-login">
				<h2>Login</h2>	 
				
					<form name = 'login' action='./Login_Controller.php' method='post' onchange="return validarLogin()" onsubmit="return encriptar();">
							<table>
								<tr>
									<td>Usuario: </td>
									<td><input class="form-est" type = 'text' name = 'login' placeholder = 'Usuario' size = '9' value = '' onblur="comprobarTexto(this,this.size)"  ></td>
								</tr>
								<tr>
									<td>Contraseña:</td>
									<td><input class="form-est" type = 'password' name = 'password' id="contrasena" placeholder = 'Contraseña' size = '15' value = '' onblur="comprobarTexto(this,this.size)"></td>
								</tr>
								<tr>
									<td><input class="form-est" type='submit' name='acceder' id="acceder" value='Login' disabled></td>
								</tr>
							</table>
							
					</form>
					<?php echo 'Usuario no autenticado'; 					
							echo "&nbsp<a href='../Controllers/Register_Controller.php'>Registrar</a>";
					?>
					
				</div>
			</body>
							
<?php
			include 'Footer.php';
		} 

	} 

?>
