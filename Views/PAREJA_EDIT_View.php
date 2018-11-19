<?php

class MODIFY_PAREJA {

	function __construct($valores,$volver){
		$this->datos=$valores;
		$this->volver=$volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Modificar pareja:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="editUser" id="editUser" action="./PAREJA_Controller.php?action=EDIT" method="POST" enctype="multipart/form-data" >
						 <table>
							<tr>
								<td>ID Pareja: </td>
								<td><input class="form-est" type="text" id="idpareja" name="idpareja" size="10" maxlength="10" placeholder="ID Pareja*" value="<?php echo $this->datos['idpareja'];?>" onBlur="comprobarTexto(this,this.size)" required readonly></td>
							</tr>
							<tr>
								<td>Login 1: </td>
								<td><input class="form-est" type="text" id="login1" name="login1" size="10" maxlength="10" placeholder="Login 1*" value="<?php echo $this->datos['login1']?>" onBlur="comprobarTexto(this,this.size)" required ></td>
							</tr>
							<tr>
								<td>Login 2: </td>
								<td><input class="form-est" type="text" id="login2" name="login2" size="10" maxlength="10" placeholder="Login 2*" value="<?php echo $this->datos['login2']?>" onBlur="comprobarTexto(this,this.size)" required ></td>
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