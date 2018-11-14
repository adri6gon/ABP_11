<?php

class SEARCH_PAREJA {

	function __construct($volver){
		//Enlace de vuelta atras
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Buscar pareja:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchPareja" id="searchPareja" action="./PAREJA_Controller.php?action=SEARCH" onChange="validarBusquedaPareja()" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
							<tr>
								<td>ID Pareja: </td>
								<td><input class="form-est" type="text" id="idpareja" name="idpareja" size="10" maxlength="10" placeholder="ID Pareja *" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>Login 1:</td>
								<td><input class="form-est" type="text" id="login1" name="login1" size="10" maxlength="10" placeholder="Login 1 *" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
							</tr>
							<tr>
								<td>Login 2:</td>
								<td><input class="form-est" type="text" id="login2" name="login2" size="10" maxlength="10" placeholder="Login 2 *" onBlur="comprobarTextoSinSearch(this,this.size)"></td>
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