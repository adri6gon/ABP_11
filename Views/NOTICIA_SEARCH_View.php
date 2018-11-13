<?php

class SEARCH_NOTICIA {

	function __construct($volver){
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Buscar noticia:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchUser" id="searchUser" action="./NOTICIAS_Controller.php?action=SEARCH" onChange="validarBusquedaUser()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
							<tr>
								<td> IdNoticia: </td>
								<td><input class="form-est" type="text" id="IdNoticia" name="IdNoticia" size="30" maxlength="50" placeholder="IdNoticia" onBlur="comprobarTexto(this,this.size)"></td>
							</tr>
							<tr>
								<td> ImageURL: </td>
								<td><input class="form-est" type="text" id="imageURL" name="imageURL" size="30" maxlength="50" placeholder="ImageURL" onBlur="comprobarTexto(this,this.size)"></td>
							</tr>
							<tr>
								<td> Enlace:</td>
								<td><input class="form-est" type="url" id="enlace" name="enlace" size="20" maxlength="50" placeholder="Enlace*" onBlur="comprobarTexto(this,this.size)"></td>
							</tr>
							<tr>
								<td>Texto: </td>
								<td><textarea rows="10" cols="50" name="texto" id="texto" form="searchUser" placeholder="Texto de la noticia"></textarea></td>
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