<?php
class CATEGORIA_SHOWALL {

	function __construct($search,$lista,$array,$volver,$admin){
		$this->search = $search;
		$this->lista = $lista;
		$this->datos = $array;
		$this->volver = $volver;
		$this->admin = $admin;
		$this->render();
	}

	function render(){
		include 'Header.php';
		
?>

<div style="overflow-x:auto;">
				<h2><?php if(!$this->search){ echo 'Tabla ShowAll de CATEGORIAS';}else{echo 'Tabla Busqueda de CATEGORIAS';} ?>:</h2>
					
					<div id="anhadir-borrar" style="text-align: center;">
					<?php
						if($this->admin)
							echo '<a href="'.$_SERVER['PHP_SELF'].'?action=ADD"><img src="../Views/images/añadir.png"></a>&nbsp<a href="'.$_SERVER['PHP_SELF'].'?action=SEARCH"><img src="../Views/images/busqueda.png"></a>';
						else
						echo '&nbsp <a href="'.$_SERVER['PHP_SELF'].'?action=SEARCH"><img src="../Views/images/busqueda.png"></a>';
					?>
					
					</div>
					<table class="tablas separador">
						<tr>
						<?php
						for($i=0; $i<count($this->lista);$i++){
								echo "<th>".$this->lista[$i]."</th>";			
						}
						echo "<th>Acciones</th></tr>";
							?>
						
						
                            <!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.-->
						<?php
							//$atributos = array('login', 'password', 'DNI', 'nombre', 'apellidos', 'telefono', 'email', 'FechaNacimiento', 'fotopersonal', 'sexo');
							for($j=0;$j<count($this->datos);$j++){
								echo "<tr>";
								for($i=0; $i<count($this->lista);$i++){
										echo "<td>".$this->datos[$j][($this->lista)[$i]]."</td>";
									
								}
								if($this->admin){
									echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=EDIT&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/editar.png"></a>&nbsp 
									<a href="'.$_SERVER['PHP_SELF'].'?action=DELETE&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/borrar.png"></a>';

									echo '<a href="'.$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/busqueda2.png"></a>';
									echo '<a href="CLASIFICACION_Controller.php?action=PLAYOFF&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'&'.($this->lista)[3].'='.$this->datos[$j][($this->lista)[3]].'"><img src="../Views/images/playoff.png" width="35" size"35" ></a></td></tr>';
								}else{
									echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=SHOWCURRENT&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'"><img src="../Views/images/busqueda2.png"></a>';
									
									echo '<a href="CLASIFICACION_Controller.php?action=PLAYOFF&'.($this->lista)[0].'='.$this->datos[$j][($this->lista)[0]].'&'.($this->lista)[3].'='.$this->datos[$j][($this->lista)[3]].'"><img src="../Views/images/playoff.png" width="35" size"35" ></a></td></tr>';
								}
								
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