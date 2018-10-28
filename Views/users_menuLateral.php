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
					if(comprobarPermisos('SHOWALL','USUARIOS')){
						echo "<li><a href='./USUARIOS_Controller.php'>".$strings['USUARIOS']."</a></li>";
					}
					//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','GRUPOS')){
						echo '<li><a href="./GRUPOS_Controller.php">'.$strings['GRUPOS'].'</a></li>';
					}
					//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','TRABAJOS')){
						echo '<li><a href="./TRABAJOS_Controller.php">'.$strings['TRABAJOS'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','HISTORIAS')){
						echo '<li><a href="./HISTORIAS_Controller.php">'.$strings['HISTORIAS'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','FUNCIONALIDAD')){
						echo '<li><a href="./FUNCIONALIDAD_Controller.php">'.$strings['FUNCIONALIDAD'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','ACCION')){
						echo '<li><a href="./ACCION_Controller.php">'.$strings['ACCION'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','ENTREGAS')){
						echo '<li><a href="./ENTREGAS_Controller.php">'.$strings['ENTREGAS'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','NOTAS_TRABAJOS')){
						echo '<li><a href="./NOTAS_TRABAJOS_Controller.php">'.$strings['NOTAS'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','PERMISOS')){
						echo '<li><a href="./PERMISOS_Controller.php">'.$strings['PERMISOS'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','EVALUACION')){
						echo '<li><a href="./EVALUACION_Controller.php">'.$strings['EVALUACIONES'].'</a></li>';
					}//Si tiene los permisos mostramos el enlace
					if(comprobarPermisos('SHOWALL','QAS')){
						echo '<li><a href="./ASIGNAC_QA_Controller.php">'.$strings['QA'].'</a></li>';
					}
					
				?>		
				</ul>
			</nav>
			<section class="content">
			