<?php

class USUARIO_DELETEView {

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

<h2>Tabla de borrado:</h2>
				<table class="tablas">
                    <!--- El primer for recorre los nombres de los atributos de la tabla usuarios en la BD. El if $this->lista $j!='Ruta' es para los valores que sean distintos de ruta muestre los valores de los atriibutos que corresponden, y al entrar en el else hace un targetblank para que muestre la imagen o archivo que subio pulsando en el enlace que sale en la tabla. El if $this->lista2!='' 
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
							if($this->lista2!=''){
								for($i=0;$i<count($this->lista2);$i++){
									$num = (string)$i+1;
									echo "<tr><th>".$this->arg.$num."</th><td>".($this->lista2)[$i]."</td><tr>";
								}
							}
					?>
				</table>
				<p><a href="<?php echo $this->volver; ?>"><img src="../Views/images/atras.png" title="Atrás" alt="Atrás"></a><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=DELETE&borrar=true&<?php echo ($this->lista)[0];?>=<?php echo $this->datos[($this->lista)[0]];?>"><img src="../Views/images/borrar3.png" title="Borrar" alt="Borrar"></a></p>
<?php
						
	include 'Footer.php';
	}
}
?>