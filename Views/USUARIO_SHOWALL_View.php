<!--
Funcion del archivo: Vista que genera tablas de X tuplas de la BD( genera la tabla con el numero de tuplas que le pasemos),puede mostrar todas las tuplas o las de un filtrado con el SEARCH
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php
class USUARIO_SHOWALL {

	function __construct($search,$lista,$array,$volver){
		$this->search = $search;
		$this->lista = $lista;
		$this->datos = $array;
		$this->volver = $volver;
		$this->render();
	}

	function render(){
		include 'Header.php';
		
?>
<div style="overflow-x:auto;">
				<h2><?php if(!$this->search){ echo $strings['Tabla ShowAll'];}else{echo $strings['Tabla Busqueda'];} ?>:</h2>
					<div id="anhadir-borrar" style="text-align: center;">
							<a href="<?php $_SERVER['PHP_SELF'] ?>?action=ADD"><img src="../Views/images/añadir.png"></a>&nbsp <a href="<?php $_SERVER['PHP_SELF'] ?>?action=SEARCH"><img src="../Views/images/busqueda.png"></a>
					</div>
					<table class="tablas separador">
						<tr>
						<?php
						for($i=0; $i<count($this->lista);$i++){
								echo "<th>".$strings[$this->lista[$i]]."</th>";			
						}
						echo "<th>".$strings["Acciones"]."</th></tr>";
							?>
						
						
                            <!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.-->
						<?php
							//$atributos = array('login', 'password', 'DNI', 'nombre', 'apellidos', 'telefono', 'email', 'FechaNacimiento', 'fotopersonal', 'sexo');
							for($j=0;$j<count($this->datos);$j++){
								echo "<tr>";
								for($i=0; $i<count($this->lista);$i++){
									if(($this->lista)[$i]!='Ruta'){
										echo "<td>".$this->datos[$j][($this->lista)[$i]]."</td>";
									}else{
										echo "<td><a href='".$this->datos[$j][($this->lista)[$i]]."' target='_blank'>".$this->datos[$j][($this->lista)[$i]]."</a></td>";									
									}
								}
								echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=EDIT&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/editar.png"></a>&nbsp <a href="'.$_SERVER['PHP_SELF'].'?action=DELETE&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/borrar.png"></a><a href="'.$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/busqueda2.png"></a></td></tr>';
								
							}
							?>
						
					</table>
    <!--- Si viene del search, search=true, muestra el boton de volver a atras -->
					<?php
						if($this->search){
								 echo "<p align='center'><a href=".$this->volver."><img src='../Views/images/atras.png' title='Atrás' alt='Atrás'></a></p>";
						} 
					?>
</div>
				


<?php		
	include 'Footer.php';
	}
}
?>