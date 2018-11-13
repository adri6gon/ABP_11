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
					}	
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('admin')){
						echo '<li><a href="./PISTAS_Controller.php?action=RESERVAS">RESERVAS</a></li>';
					}	
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('admin')){
						echo '<li><a href="./CAMPEONATOS_Controller.php">CAMPEONATOS</a></li>';
					}	
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('admin')){
						echo '<li><a href="./CATEGORIAS_Controller.php">CATEGORIAS</a></li>';
					}	
					// if(comprobarRol('admin')){
					// 	echo '<li><a href="./TRABAJOS_Controller.php">TRABAJOS</a></li>';
					// }	
					//Si tiene los permisos mostramos el enlace
					if(comprobarRol('admin')){
						echo '<li><a href="./PARTIDOS_Controller.php">PARTIDOS</a></li>';
					}		
					if(comprobarRol('PAREJA')){
						echo '<li><a href="./PAREJA_Controller.php">PAREJA</a></li>';
					}								
				?>		
				</ul>
			</nav>
			<section class="content">
			