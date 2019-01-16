<?php

class PLAYOFF_SHOWCURRENT {

	function __construct($array,$volver,$lista, $admin,$hora,$fecha,$asignado){
		$this->datos = $array;
		$this->volver = $volver;
		$this->lista = $lista;
		$this->admin = $admin;
		$this->hora = $hora;
		$this->fecha = $fecha;
		$this->asignado = $asignado;
		$this->render();
	}

	function render(){
		include 'Header.php';
		
		
?>

<h2>Tabla en detalle:</h2>
				<table class="tablas">
                    
<!--Bucle PHP con las tuplas.
El primer for recorre la lista con los valores de las tuplas de la BD y en el segundo recorre los nombres de los atributos, entonces al estar en un campo determinado muestra el valor que tiene en la BD. Ademas muestra los iconos con las acciones a hacer en cada uno de ellos.

$lista2 como array auxiliar para enviar datos de otra tabla a esta vista p.e: Usuarios de un mismo grupo
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
							echo "</tr>";
							if($this->admin){
								//Insertar resultado del enfrentamiento
								echo '<a href="./CLASIFICACION_Controller.php?action=RESULTADO&'.($this->lista)[0].'='.$this->datos["idEnfrentamientoRonda"].'">Insertar resultado</a>';
							}else{
								//Hacer mas actions en el Controlador para que proponga hora en la enfrentamiento-ronda
								if(!$this->hora && !$this->fecha){
									//var_dump($this->hora,$this->fecha);
									//exit();
									echo '<a href="./ENFRENTAMIENTOS_Controller.php?action=PROPONER-HORA-RONDA&'.($this->lista)[0].'='.$this->datos["idEnfrentamientoRonda"].'"><img src="../Views/images/fijar-hora.png" title="Fijar hora" alt="Fijar hora"></a>';
								}elseif(!$this->asignado){
									//Aceptar
									echo '<a href="./ENFRENTAMIENTOS_Controller.php?action=ACEPTAR-HORA-RONDA&'.($this->lista)[0].'='.$this->datos["idEnfrentamientoRonda"].'">Aceptar hora</a>';
									//Rechazar
									echo '<a href="./ENFRENTAMIENTOS_Controller.php?action=CANCELAR-HORA-RONDA&'.($this->lista)[0].'='.$this->datos["idEnfrentamientoRonda"].'"><img src="../Views/images/cancel-hour.png" title="Cancelar hora" alt="Cancelar hora"></a>';
							
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