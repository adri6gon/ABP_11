<!--
Funcion del archivo: Vista que genera la cabecera de la web.
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php
	include_once '../Functions/Authentication.php';
	//Si no tiene guardado el idioma en la sesion
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}//Si no lo tiene 
	else{
	}
	include '../Locales/Strings_' . $_SESSION['idioma'] . '.php';
?>
<!DOCTYPE html>
<html lang="en"> 
	<head>
		<meta charset="utf-8">
		<title>BiblioWeb</title>
		<meta name="description" content="">
		<meta name="author" content="Adrian Gonzalez Fernandez">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='' rel='icon' type='image/x-icon'/>
		<link rel="stylesheet" href="../Views/css/style.css">
		<link rel="stylesheet" href="../Views/css/responsive.css">
		<link rel="stylesheet" href="../Views/css/tcal.css">
		<script type="text/javascript" src="../Views/jscript/menu.js"></script>
		<script type="text/javascript" src="../Views/jscript/md5.js"></script>
		<script type="text/javascript" src="../Views/jscript/tcal.js"></script>
		<script type="text/javascript" src="../Views/jscript/validaciones.js"></script>
		<script type="text/javascript" src="../Views/jscript/comprobacion.js"></script>	
		<script>
		  $( function() {
			$( "#fechanac" ).datepicker();
		  } );
		</script>
		<script type="text/javascript">
	    function encriptar(){
	      document.getElementById('contrasena').value = hex_md5(document.getElementById('contrasena').value);
	      return true;
	    }
	</script>		
		
		
	</head>
	<body>
		<!--Cabecera-->
		<header>
				<div id="cabecera-izq">
					<div id="logo">
						<a href="../Controllers/USUARIOS_Controller.php"><img src="../Views/images/biblio.png" alt="<?php echo $strings['Biblioteca'];?>" title="<?php echo $strings['Biblioteca'];?>"/></a>
					</div>
					<div id="titulo">
						<h1>
						<?php echo $strings['Biblioteca'];?>
						</h1>
					</div>

					
				</div>
				<div id="cabecera-der">
					<div id="idioma">
						    <?php echo $strings['Idioma']; ?>
							
							<a href="../Functions/CambioIdioma.php?idioma=ENGLISH"><img src="../Views/images/english.png"  title="<?php echo $strings['INGLES']; ?>" alt="<?php echo $strings['INGLES']; ?>"></a>
							<a href="../Functions/CambioIdioma.php?idioma=SPANISH"><img src="../Views/images/spanish.png" title="<?php echo $strings['ESPAÑOL']; ?>" alt="<?php echo $strings['ESPAÑOL']; ?>"></a>
							<a href="../Functions/CambioIdioma.php?idioma=GALICIAN"><img src="../Views/images/galego.png" title="<?php echo $strings['GALICIAN']; ?>" alt="<?php echo $strings['GALICIAN']; ?>"></a>

					</div>
<?php
	//Si esta autenticado mostramos el usuario logeado
	if (IsAuthenticated()){
?>
					<div class="login">
						<div id="usuario"><a href="#"><img src="../Views/images/user.png" alt="<?php echo $strings['Usuario']; ?>" title="<?php echo $strings['Usuario']; ?>"> <?php echo $_SESSION['login']?></a></div>
						<div id="salir"><a href="../Functions/Desconectar.php"><img src="../Views/images/logout-blanco.png" alt="<?php echo $strings['Salir']; ?>" title="<?php echo $strings['Salir']; ?>"></a></div>
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