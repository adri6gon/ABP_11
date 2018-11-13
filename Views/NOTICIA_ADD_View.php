<?php

class ADD_NOTICIAS {
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
<h2 style="color:white;">Añadir noticia:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="anadirUser" id="anadirUser" action="./NOTICIAS_Controller.php?action=ADD"  method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td> ImageURL: </td>
								<td><input class="form-est" type="text" id="imageURL" name="imageURL" size="30" maxlength="50" placeholder="ImageURL" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td> Enlace:</td>
								<td><input class="form-est" type="url" id="enlace" name="enlace" size="20" maxlength="50" placeholder="Enlace*" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Texto: </td>
								<td><textarea rows="10" cols="50" name="texto" id="texto" form="anadirUser" placeholder="Texto de la noticia"></textarea></td>
							</tr>							
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="insertar" name="insertar" value="Insertar" ></td>
							</tr>
						 </table>
						 <p><a href=" $this->volver; ?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
					</form>
				</div>


<?php		
	include 'Footer.php';
	}
}
?>