<!--
Funcion del archivo: Vista que genera el menu lateral cuando un usuario esta logeado en la web
Autor: j0z5zs
Fecha: 23/11/17
-->
	<!--Navegador PROVISIONAL-->
		<div class="cuerpo">
			<nav class="menu">
				<p>Menu</p>
				
				<ul>
				<?php	
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('USUARIOS')){
						echo "<li><a href='./USUARIOS_Controller.php'>USUARIOS</a></li>";
					}
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('GRUPOS')){
						echo '<li><a href="./GRUPOS_Controller.php">GRUPOS</a></li>';
					}
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('TRABAJOS')){
						echo '<li><a href="./TRABAJOS_Controller.php">TRABAJOS</a></li>';
					}					
					
				?>		
				</ul>
			</nav>
			<section class="content">
			