<?php

class CLASE_SHOWCURRENT {

	function __construct($array,$volver,$lista){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla en detalle:</h2>
				<table class="tablas">
                    
<!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.

$lista2 como array auxiliar para enviar datos de otra tabla a esta vista p.e: Campeonatos de un mismo grupo
$arg es un string auxiliar para enviar el nombre de los atributos del array auxiliar p.e: Enviar "Miembro " y concatenar -->
					<?php	
							for($j=1;$j<count($this->lista);$j++){
								echo "<tr>";
									echo "<th>".($this->lista)[$j]."</th><td>".$this->datos[($this->lista)[$j]]."</td>";
								echo "<tr>";
							}

							
					?>
				</table>
				<?php
				if(comprobarRol('admin') || comprobarRol('entrenador'))
					echo '<a href="'.$_SERVER['PHP_SELF'].'?action=ASISTENCIA&idClase='.$this->datos['idClase'].'">Control de asistencia</a>';
				?>
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>