<?php

class ADD_PAREJA {
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
<h2 style="color:white;">Añadir pareja:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="anadirUser" id="anadirUser" action="./PAREJA_Controller.php?action=ADD"  method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td> ID Pareja: </td>
								<td><input class="form-est" type="text" id="idpareja" name="idpareja" size="10" maxlength="10" placeholder="ID Pareja*" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td> Login 1:</td>
								<td><input class="form-est" type="text" id="login1" name="login1" size="10" maxlength="10" placeholder="Login 1*" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
							<tr>
								<td>Login 2: </td>
								<td><input class="form-est" type="text" id="login2" name="login2" size="10" maxlength="10" placeholder="Login 2*" onBlur="comprobarTexto(this,this.size)" required></td>
							</tr>
													
							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="insertar" name="insertar" value="Añadir pareja" ></td>
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