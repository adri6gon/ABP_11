<!--
Funcion del archivo: Vista que genera la tabla de showcurrent de una tupla de la BD
Autor: j0z5zs
Fecha: 23/12/17
Contemplar el caso de mostrar un grupo que tendra que mostrar los usuarios que pertenecen al grupo que se muestre.
-->

<?php

class USUARIO_SHOWCURRENT {

	function __construct($array,$volver,$lista,$lista2,$arg){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;
		$this->lista2 = $lista2;
		$this->arg = $arg;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2><?php echo $strings['Tabla en detalle']; ?>:</h2>
				<table class="tablas">
                    
<!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.

$lista2 como array auxiliar para enviar datos de otra tabla a esta vista p.e: Usuarios de un mismo grupo
$arg es un string auxiliar para enviar el nombre de los atributos del array auxiliar p.e: Enviar "Miembro " y concatenar -->
					<?php	
							for($j=0;$j<count($this->lista);$j++){
								echo "<tr>";
								if(($this->lista)[$j]!='Ruta'){
									echo "<th>".$strings[($this->lista)[$j]]."</th><td>".$this->datos[($this->lista)[$j]]."</td>";
								}else{									
									echo "<th>".$strings[($this->lista)[$j]]."</th><td><a href='".$this->datos[($this->lista)[$j]]."' target='_blank'>".$this->datos[($this->lista)[$j]]."</a></td>";
									}
								echo "<tr>";
							}
							if($this->lista2!=''){
								for($i=0;$i<count($this->lista2);$i++){
									$num = (string)$i+1;
									echo "<tr><th>".$this->arg.$num."</th><td>".($this->lista2)[$i]."</td><tr>";
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