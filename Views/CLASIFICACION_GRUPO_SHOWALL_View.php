<?php

class CLASIFICACION_GRUPO_SHOWALL {

	function __construct($array,$volver,$lista){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;	
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Clasificacion del Grupo:</h2>
				<table class="tablas">
					<?php	
							foreach($this->datos as $valor){
								echo "<tr><th>".$valor['login1'].'-'.$valor['login2']."</th>";
									if($this->lista[$valor['idPareja']] !=null){
										echo "<td>".$this->lista[$valor['idPareja']]." puntos</td></tr>";
									}else{
										echo "<td>0</td></tr>";
									}
							}
					?>
				</table>
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>