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
				<h2><?php echo $strings['Login']; ?></h2>	 
				
					<form name = 'login' action='./Login_Controller.php' method='post' onchange="return validarLogin()" onsubmit="return encriptar();">
							<table>
								<tr>
									<td><?php echo $strings['Usuario']; ?>: </td>
									<td><input class="form-est" type = 'text' name = 'login' placeholder = '<?php echo $strings['Usuario']; ?>' size = '9' value = '' onblur="comprobarTexto(this,this.size)"  ></td>
								</tr>
								<tr>
									<td><?php echo $strings['Contrasenha']; ?> :</td>
									<td><input class="form-est" type = 'password' name = 'password' id="contrasena" placeholder = '<?php echo $strings['Contrasenha']; ?>' size = '15' value = '' onblur="comprobarTexto(this,this.size)"></td>
								</tr>
								<tr>
									<td><input class="form-est" type='submit' name='acceder' id="acceder" value='<?php echo $strings['Login']; ?>' disabled></td>
								</tr>
							</table>
							
					</form>
					<?php echo $strings['Usuario no autenticado']; 					
							echo "&nbsp<a href='../Controllers/Register_Controller.php'>".$strings['Registrar']."</a>";
					?>
					
				</div>
			</body>
							
<?php
			include 'Footer.php';
		} 

	} 

?>
