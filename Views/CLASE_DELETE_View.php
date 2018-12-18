<?php

class CLASE_DELETE {

	function __construct($array,$volver,$lista){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;

		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla de borrado:</h2>
				<table class="tablas">
                    <!--- El primer for recorre los nombres de los atributos de la tabla campeonatos en la BD. El if $this->lista $j!='Ruta' es para los valores que sean distintos de ruta muestre los valores de los atributos que corresponden, y al entrar en el else hace un targetblank para que muestre la imagen o archivo que subio pulsando en el enlace que sale en la tabla. El if $this->lista2!='' 
                    $lista2 como array auxiliar para enviar datos de otra tabla a esta vista p.e: Campeonatos de un mismo grupo
                    $arg es un string auxiliar para enviar el nombre de los atributos del array auxiliar p.e: Enviar "Miembro " y concatenar -->
					<?php
							for($j=0;$j<count($this->lista);$j++){
								echo "<tr>";
									echo "<th>".($this->lista)[$j]."</th><td>".$this->datos[($this->lista)[$j]]."</td>";
								echo "<tr>";
							}

					?>
				</table>
				<p><a href="<?php echo $this->volver; ?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=DELETE&borrar=true&idClase=<?php echo $this->datos['idClase'];?>"><img src="../Views/images/borrar3.png" title="Borrar" alt="Borrar"></a></p>
<?php
						
	include 'Footer.php';
	}
}
?>