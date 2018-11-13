<!--
Funcion del archivo: Archivo que contiene la vista de la inserción de un campeonato
Autor: Noe
Fecha: 05/11/18
-->
<?php

class ADD_PARTIDO {
//Constructor
	function __construct($pistas, $volver){
        $this->pistas = $pistas;
		//Enlace de vuelta atras
		$this->volver = $volver;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Añadir partido:</h2>
				<div style="overflow-x:auto;color:white;">
					<form name="anadirPARTIDO" id="anadirCategoria" action="./PARTIDOS_Controller.php?action=ADD"  method="POST" enctype="multipart/form-data" onsubmit="return encriptar()">
						 <table>
							<tr>
								<td>Fecha:</td>
								<td><input class="form-est" type="date" id="fecha" name="fecha" placeholder="01/01/2018" required></td>
							</tr>
							<tr>
								<td>Pista:</td>
								<td><select class="form-est" id="pista" name="pista">
							<?php
								for($j=0;$j<count($this->pistas);$j++){
										echo "<option value=".$this->pistas[$j]["nombre"]." >".$this->pistas[$j]["nombre"]."</option>";	
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