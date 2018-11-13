<?php

class MODIFY_NOTICIA {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Modificar usuario:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="editUser" id="editUser" action="./NOTICIAS_Controller.php?action=EDIT" onChange="validarEditarUser()" onLoad="validarEditarUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>IdNoticia: </td>
								<td><input class="form-est" type="text" id="idNoticia" name="idNoticia" size="9" maxlength="9" placeholder="IdNoticia*" value="<? echo $this->datos['idNoticia']?>" onBlur="comprobarTexto(this,this.size)" required readonly></td>
							</tr>
							<tr>
								<td>ImageURL:</td>
								<td><input class="form-est" type="text" id="imageURL" name="imageURL" size="20" maxlength="50" placeholder="ImageURL" value="<? echo $this->datos['imageURL']?>" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Enlace: </td>
								<td><input class="form-est" type="url" id="enlace" name="enlace" size="40" maxlength="50" placeholder="Enlace" value="<? echo $this->datos['enlace']?>" onBlur="comprobarAlfabetico(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Texto: </td>
								<td><textarea rows="10" cols="50" name="texto" id="texto" form="editUser"><? echo $this->datos['texto']?></textarea></td>
							</tr>							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="editar" name="editar" value="Editar"></td>
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