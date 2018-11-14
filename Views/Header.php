<!--
Funcion del archivo: Vista que genera la cabecera de la web.
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php
	include_once '../Functions/Authentication.php';
?>
<!DOCTYPE html>
<html lang="en"> 
	<head>
		<meta charset="utf-8">
		<title>Padel Club</title>
		<meta name="description" content="">
		<meta name="author" content="Adrian Gonzalez Fernandez">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='' rel='icon' type='image/x-icon'/>
		<link rel="stylesheet" href="../Views/css/style.css">
		<link rel="stylesheet" href="../Views/css/responsive.css">
		<link rel="stylesheet" href="../Views/css/tcal.css">
		<script type="text/javascript" src="../Views/jscript/menu.js"></script>
		<script type="text/javascript" src="../Views/jscript/tcal.js"></script>
		<script type="text/javascript" src="../Views/jscript/validaciones.js"></script>
		<script type="text/javascript" src="../Views/jscript/comprobacion.js"></script>	
		<script>
		  $( function() {
			$( "#fechanac" ).datepicker();
		  } );
		</script>
			
		
		
	</head>
	<body>
		<!--Cabecera-->
		<header>
				<div id="cabecera-izq">
					<div id="logo">
						<a href="../Controllers/Index_Controller.php"><img src="../Views/images/cabecera.png" alt="Padel" title="Padel"/></a>
					</div>
					<div id="titulo">
						<h1>
						Padel Club
						</h1>
					</div>

					
				</div>
				<div id="cabecera-der">
					
<?php
	//Si esta autenticado mostramos el usuario logeado
	if (IsAuthenticated()){
?>
					<div class="login">
						<div id="usuario"><a href="#"><img src="../Views/images/user.png" alt="Usuario" title="Usuario"> <?php echo $_SESSION['login']?></a></div>
						<div id="salir"><a href="../Functions/Desconectar.php"><img src="../Views/images/logout-blanco.png" alt="Salir" title="Salir"></a></div>
					</div>

				
	

<?php
	}else{
		?>
					<div class="login">
						<a href="../Controllers/Login_Controller.php">Login</a>
					</div>
<?php
	}
?>
		</div>	    
</header>
<?php
	//Si esta autenticado mostramos el menu lateral
	if(IsAuthenticated()){
	include 'users_menuLateral.php';
	}
?>