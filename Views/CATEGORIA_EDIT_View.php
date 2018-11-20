<!--
Funcion del archivo: Archivo que contiene la vista de la inserción de un campeonato
Autor: Noe
Fecha: 05/11/18
-->
<?php

class CATEGORIA_EDIT {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Modificar categoria:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="modificarCategoria" id="modificarCategoria" action="./CATEGORIAS_Controller.php?action=EDIT"  method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>Id Categoria: </td>
								<td><input class="form-est" type="text" id="idCategoria" name="idCategoria" maxlength="10" value="<? echo $this->datos['idCategoria']?>" readonly required></td>
							</tr>
							<tr>
								<td>Genero:</td>
								
								<td> <input class="form-est" type="radio" name="genero" id="A" value="A" <?php echo (($this->datos['genero'])=='A')?'checked':'' ?> /> A &nbsp;
                        		 <input type="radio" name="genero" id="F" value="F" <?php echo (($this->datos['genero'])=='F')?'checked':'' ?> /> F &nbsp;
                        		 <input type="radio" name="genero" id="M" value="M" <?php echo (($this->datos['genero'])=='M')?'checked':'' ?> /> M &nbsp; </td>
							</tr>
							<tr>
								<td>Nivel:</td>
								<td><input class="form-est" type="text" id="nivel" name="nivel" size="30" maxlength="30" value="<? echo $this->datos['nivel']?>" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Id Campeonato:</td>
								<td><input class="form-est" type="text" id="idCampeonato" name="idCampeonato" maxlength="10" value="<? echo $this->datos['idCampeonato']?>" readonly required></td>
							</tr>							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="editar" name="editar" value="Editar" ></td>
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