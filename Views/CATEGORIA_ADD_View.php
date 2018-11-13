<!--
Funcion del archivo: Archivo que contiene la vista de la inserción de un campeonato
Autor: Noe
Fecha: 05/11/18
-->
<?php

class ADD_CATEGORIA {
//Constructor
	function __construct($valores,$lista,$volver){
		//Enlace de vuelta atras
		$this->datos=$valores;
		$this->lista = $lista;
		$this->volver=$volver;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Añadir categoria:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="anadirCategoria" id="anadirCategoria" action="./CATEGORIAS_Controller.php?action=ADD"  method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>Id Categoria: </td>
								<td><input class="form-est" type="text" id="idCategoria" name="idCategoria" size = "10" maxlength="10" placeholder="1" onBlur="comprobarEntero(this,0,9999999999)" ></td>
							</tr>
							<tr>
								<td>Genero:</td>
								<td> <input class="form-est" type="radio" name="genero" id="A" value="A" checked="checked" /> A &nbsp;
                        		 <input type="radio" name="genero" id="F" value="F" /> F &nbsp;
                        		 <input type="radio" name="genero" id="M" value="M" /> M &nbsp; </td>
							</tr>
							<tr>
								<td>Nivel:</td>
								<td><input class="form-est" type="text" id="nivel" name="nivel" size="30" maxlength="30" placeholder="Primera" onBlur="comprobarTexto(this,this.size)" ></td>
							</tr>
							<tr>
								<td>Id Campeonato:</td>
								<td><select class="form-est" id="idCampeonato" name="idCampeonato">
							<?php
								for($j=0;$j<count($this->datos);$j++){
										echo "<option value=".$this->datos[$j][($this->lista)[0]]." >".$this->datos[$j][($this->lista)[0]]."&nbsp;&nbsp;&nbsp;".$this->datos[$j][($this->lista)[1]]."</option>";	
								}
							?>
								</select></td>
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