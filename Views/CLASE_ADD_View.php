<?php

class ADD_CAMPEONATO {
//Constructor
	function __construct($volver){
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Añadir campeonato:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="anadirCampeonato" id="anadirCampeonato" action="./CAMPEONATOS_Controller.php?action=ADD"  method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>Nombre:</td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" placeholder="Roland Garros" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Fecha inicio Inscripción:</td>
								<td><input class="form-est" type="date" id="fechaIniInscripcion" name="fechaIniInscripcion" placeholder="01/01/2018" required></td>
							</tr>
							<tr>
								<td>Fecha fin Inscripción:</td>
								<td><input class="form-est" type="date" id="fechaFinInscripcion" name="fechaFinInscripcion" placeholder="01/01/2018" required></td>
							</tr>							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="insertar" name="insertar" value="Insertar" ></td>
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