<?php

class PISTA_SHOWCURRENT {

	function __construct($array,$volver,$lista){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla en detalle de hora/pista:</h2>
				<table class="tablas">
					<?php	
							for($j=0;$j<count($this->lista);$j++){
								echo "<tr>";						
									echo "<th>".($this->lista)[$j]."</th><td><a href='".$this->datos[($this->lista)[$j]]."' target='_blank'>".$this->datos[($this->lista)[$j]]."</a></td>";
								echo "<tr>";
							}
							if(!$this->datos['restriccion']){
								if(comprobarRol('admin')){
									echo '<form name="reserveAdmin" id="reserveAdmin" action="./PISTAS_Controller.php?action=RESERVE&'.($this->lista)[0].'='.$this->datos["idPista"].'&'.($this->lista)[2].'='.$this->datos["nombre"].'" onChange="validarBusquedaUser()" method="POST" enctype="multipart/form-data">';
									echo 'Login: <br>
									<input class="form-est" type="text" id="login" name="login" size="20" maxlength="20" placeholder="Login" onBlur="comprobarTextoSinSearch(this,this.size)"><br>
									<input class="form-est" type="submit" id="reservar" name="reservar" value="Reservar">';
									echo '</form>';
								}else{
									//Feito para reservar un usuario, non para que reserve un admin por un usuario!
									echo "<a href=".$_SERVER['PHP_SELF'].'?action=RESERVE&'.($this->lista)[0].'='.$this->datos["idPista"].'&'.($this->lista)[2].'='.$this->datos["nombre"].'>Reservar pista</a>';
								}

							}
					?>
				</table>
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>