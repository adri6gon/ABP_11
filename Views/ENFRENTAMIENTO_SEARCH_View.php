
<?php

class SEARCH_ENFRENTAMIENTO {

	function __construct($volver){
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Buscar enfrentamiento:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchEnfrentamientos" id="searchEnfrentamientos" action="./ENFRENTAMIENTOS_Controller.php?action=SEARCH" onChange="validarBusquedaUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
							<tr>
								<td>idEnfrentamiento: </td>
								<td><input class="form-est" type="text" id="idEnfrentamiento" name="idEnfrentamiento" size="9" maxlength="9" placeholder="idEnfrentamiento" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>idGrupo:</td>
								<td><input class="form-est" type="text" id="idGrupo" name="idGrupo" size="20" maxlength="20" placeholder="idGrupo" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>idPareja1:</td>
								<td><input class="form-est" type="text" id="idPareja1" name="idPareja1" size="40" maxlength="40" placeholder="idPareja1" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>idPareja2: </td>
								<td><input class="form-est" type="text" id="idPareja2" name="idPareja2" size="30" maxlength="30" placeholder="idPareja2" onBlur="comprobarAlfabeticoSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>idCategoria: </td>
								<td><input class="form-est" type="text" id="idCategoria" name="idCategoria" size="50" maxlength="50"placeholder="idCategoria" onBlur="comprobarAlfabeticoSearch(this,this.size)"></td>
							</tr>	
							<tr>
								<td>idCampeonato: </td>
								<td><input class="form-est" type="text" id="idCampeonato" name="idCampeonato" size="50" maxlength="50"placeholder="idCampeonato" onBlur="comprobarAlfabeticoSearch(this,this.size)"></td>
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