<?php

class GRUPO_SHOWCURRENT {

	function __construct($array,$array2,$volver,$lista,$lista2, $admin){
		$this->datos = $array;
		$this->datospa = $array2;
		$this->volver = $volver;
		$this->lista = $lista;
		$this->listapa = $lista2;
		$this->admin = $admin;
		//$this->arg = $arg;		
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla en detalle:</h2>
				<table class="tablas">
                    
<!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.

$lista2 como array auxiliar para enviar datos de otra tabla a esta vista p.e: Categoria de un mismo grupo
$arg es un string auxiliar para enviar el nombre de los atributos del array auxiliar p.e: Enviar "Miembro " y concatenar -->

					<?php	
							for($j=0;$j<count($this->lista);$j++){
								echo "<tr>";
								if(($this->lista)[$j]!='Ruta'){
									echo "<th>".($this->lista)[$j]."</th><td>".$this->datos[($this->lista)[$j]]."</td>";
								}else{									
									echo "<th>".($this->lista)[$j]."</th><td><a href='".$this->datos[($this->lista)[$j]]."' target='_blank'>".$this->datos[($this->lista)[$j]]."</a></td>";
									}
								echo "<tr>";
							}
							/*if($this->lista2!=''){
								for($i=0;$i<count($this->lista2);$i++){
									$num = (string)$i+1;
									echo "<tr><th>".$this->arg.$num."</th><td>".($this->lista2)[$i]."</td><tr>";
								}
							}*/
							//echo "var_dump($this->datos[3])";
					?>
					
				</table>
<h2>Parejas del grupo:</h2>
				<table>

					<?php	

						if($this->datospa!=null){
							for($i=0; $i<count($this->listapa);$i++){
								echo "<th>".$this->listapa[$i]."</th>";			
							}

							for($j=0;$j<count($this->datospa);$j++){
								echo "<tr>";
								for($i=0; $i<count($this->listapa);$i++){
										echo "<td>".$this->datospa[$j][($this->listapa)[$i]]."</td>";	
								}
							}
						}else{
							echo "&nbsp;&nbspTodavía no hay parejas asignadas a este grupo.";
						}
					?>
					
				</table>
						<?php
								if($this->admin){
						?>
				<table class="tablas"><tr><th>
				<p>Generar enfrentamientos 
					<?php
					echo '<a href="'.$_SERVER['PHP_SELF'].'?action=GENERAR&'.($this->lista)[0].'='.$this->datos[($this->lista)[0]].'&'.($this->lista)[2].'='.$this->datos[($this->lista)[2]].'&'.($this->lista)[3].'='.$this->datos[($this->lista)[3]].'"><img src="../Views/images/generarcalendario.png" width="40" size"40" title="Generar" alt="Generar"></a>';
					?>
						
					</p></th></tr>

			</table>
			<?php
								}
			?>
				<p><a href="<?php echo $this->volver?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a></p>
<?php		
	include 'Footer.php';
	}
}
?>