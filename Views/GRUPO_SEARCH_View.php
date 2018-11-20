<?php

class SEARCH_GRUPO {

	function __construct($valores,$valores2,$lista,$lista2,$volver){
		//Enlace de vuelta atras
		$this->datos=$valores;
		$this->datos2=$valores2;
		$this->lista = $lista;
		$this->lista2 = $lista2;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Buscar grupo:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchGrupo" id="searchGrupo" action="./GRUPOS_Controller.php?action=SEARCH" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
							<tr>
								<td>Id Grupo: </td>
								<td><input class="form-est" type="text" id="idGrupo" name="idGrupo" size = "10" maxlength="10" placeholder="1" onBlur="comprobarEnteroSearch(this,0,9999999999)" ></td>
							</tr>
							<tr>
								<td>Nombre:</td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" placeholder="PrimeraMasculina" onBlur="comprobarTextoSearch(this,this.size)" ></td>
							</tr>
							<tr>
								<td>Categoria:</td>
								<td><select class="form-est" id="idCategoria" name="idCategoria">
									<option></option>
							<?php
								for($j=0;$j<count($this->datos2);$j++){
										echo "<option value=".$this->datos2[$j][($this->lista2)[0]]." >".$this->datos2[$j][($this->lista2)[0]]."&nbsp;&nbsp;&nbsp;".$this->datos2[$j][($this->lista2)[1]]."&nbsp;&nbsp;&nbsp;".$this->datos2[$j][($this->lista2)[2]]."</option>";	
								}
							?>
								</select></td>

							</tr>
							<tr>
								<td>Campeonato:</td>
								<td><select class="form-est" id="idCampeonato" name="idCampeonato">
									<option></option>
							<?php
								for($j=0;$j<count($this->datos);$j++){
										echo "<option value=".$this->datos[$j][($this->lista)[0]]." >".$this->datos[$j][($this->lista)[0]]."&nbsp;&nbsp;&nbsp;".$this->datos[$j][($this->lista)[1]]."</option>";	
								}
							?>
								</select></td>

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