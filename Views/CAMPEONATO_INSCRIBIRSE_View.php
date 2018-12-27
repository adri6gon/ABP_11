<?php

class INSCRIBIRSE_CAMPEONATO {

	function __construct($categorias,$parejas,$nombreCampeonato,$volver,$lista,$admin){
		//Enlace de vuelta atras
		$this->categorias=$categorias;
		$this->parejas=$parejas;
		$this->volver=$volver;
		$this->lista=$lista;
		$this->nombreCampeonato=$nombreCampeonato;
		$this->admin=$admin;	
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Inscribirse campeonato:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="searchCampeonato" id="searchCampeonato" action="./CAMPEONATOS_Controller.php?action=INSCRIBIR" method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						<table>
							<tr>
								<td>Nombre:</td>
								<td><input class="form-est" type="text" id="nombre" name="nombre" size="30" maxlength="30" value="<?php echo $this->nombreCampeonato['nombre']?>" onBlur="comprobarTextoSearch(this,this.size)" readonly>
									<input  type="hidden" id="idCampeonato" name="idCampeonato" size="30" maxlength="30" value="<?php echo $this->nombreCampeonato['idCampeonato']?>" readonly></td>
							</tr>	
							<tr>
								<td>Id Categoria:</td>
								<td><select class="form-est" id="idCategoria" name="idCategoria">
							<?php
								for($j=0;$j<count($this->categorias);$j++){
										echo "<option value=".$this->categorias[$j]['idCategoria']." >".$this->categorias[$j]['genero'].'-'.$this->categorias[$j]['nivel']."&nbsp;&nbsp;&nbsp;".$this->categorias[$j][($this->lista)[1]]."</option>";	
								}
							?>
								</select></td>
							</tr>	
							<tr>
								<td>Pareja:</td>
								<?php 
								if(!$this->admin){
											echo '<td><select class="form-est" id="idPareja" name="idPareja">';
									
										for($i=0;$i<count($this->parejas);$i++){
												echo "<option value=".$this->parejas[$i]['idPareja']." >".$this->parejas[$i]['login1'].'-'.$this->parejas[$i]['login2']."&nbsp;&nbsp;&nbsp;".$this->parejas[$i][($this->lista)[1]]."</option>";	
										}
							
								echo '</select></td>';
								}else{
									echo '<td><input class="form-est" type="text" id="idPareja" name="idPareja" size="30" maxlength="30" value="" onBlur="comprobarTextoSearch(this,this.size)"></td>';
								}
								?>
								
							</tr>				

							<tr>
								<td colspan="2" align="center"><input class="form-est" type="submit" id="Inscribirse" name="Inscribirse" value="Inscribirse"></td>
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