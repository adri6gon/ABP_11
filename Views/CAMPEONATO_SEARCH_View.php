<?php

class SEARCH_CAMPEONATO {

	function __construct($volver){
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Buscar campeonato:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchCampeonato" id="searchCampeonato" action="./CAMPEONATOS_Controller.php?action=SEARCH" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
							<tr>
								<td>Id: </td>
								<td><input class="form-est" type="text" id="idCampeonato" name="idCampeonato" size="10" maxlength="10" placeholder="1" onBlur="comprobarEnteroSearch(this,0,9999999999)" ></td>
							</tr>
							<tr>
								<td>Nombre:</td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" placeholder="Roland Garros" onBlur="comprobarTextoSearch(this,this.size)" ></td>
							</tr>
							<tr>
								<td>Fecha inicio Inscripción:</td>
								<td><input class="form-est" type="date" id="fechaIniInscripcion" name="fechaIniInscripcion" placeholder="01/01/2018" readonly></td>
							</tr>
							<tr>
								<td>Fecha fin Inscripción:</td>
								<td><input class="form-est" type="date" id="fechaFinInscripcion" name="fechaFinInscripcion" placeholder="01/01/2018" readonly></td>
							</tr>							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="buscar" name="buscar" value="Buscar"></td>
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