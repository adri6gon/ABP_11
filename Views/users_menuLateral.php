	<!--Navegador PROVISIONAL-->
		<div class="cuerpo">
			<nav class="menu">
				<p>Menu</p>
				
				<ul>
				<?php	
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('admin')){
						echo "<li><a href='./USUARIOS_Controller.php'>USUARIOS</a></li>";
					}
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('admin')){
						echo '<li><a href="./NOTICIAS_Controller.php">NOTICIAS</a></li>';
					}
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('deportista')){
						echo '<li><a href="./PISTAS_Controller.php">PISTAS</a></li>';
					}	
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('deportista')){
						echo '<li><a href="./PISTAS_Controller.php?action=RESERVAS">RESERVAS</a></li>';
					}	
					
				?>		
				</ul>
			</nav>
			<section class="content">
			