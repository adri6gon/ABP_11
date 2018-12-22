<?php

class INSCRIBIRSE_CLASE{

	function __construct($volver,$lista,$datos,$admin,$tope){
		//Enlace de vuelta atras
		$this->volver=$volver;
        $this->lista=$lista;
        $this->datos = $datos;
        $this->admin=$admin;
        $this->tope = $tope;	
		$this->render();
	}

	function render(){
		include 'Header.php';
?>
<h2 style="color:white;">Inscribirse clase:</h2>
				<div style="overflow-x:auto;color:white;">
					<?
                        if(!$this->tope){
                            if(comprobarRol('admin')){
                                echo '<form name="inscribirseAdmin" id="inscribirseAdmin" action="./CLASES_Controller.php?action=INSCRIBIR&idClase='.$this->datos["idClase"].'" onChange="validarBusquedaUser()" method="POST" enctype="multipart/form-data">';
                                echo 'Login: <br>
                                <input class="form-est" type="text" id="login" name="login" size="20" maxlength="20" placeholder="Login" onBlur="comprobarTextoSinSearch(this,this.size)"><br>
                                <input class="form-est" type="submit" id="inscribir" name="inscribir" value="Inscribir">';
                                echo '</form>';
                            }else{
                                //Feito para reservar un usuario, non para que reserve un admin por un usuario!
                                echo "<a href=".$_SERVER['PHP_SELF'].'?action=INSCRIBIR&idClase='.$this->datos["idClase"].'>Inscribirme a clase</a>';
                            }
                        }
                        echo "<table>";
                        for($j=1;$j<count($this->lista);$j++){
                            echo "<tr>";
                                echo "<th>".($this->lista)[$j]."</th><td>".$this->datos[($this->lista)[$j]]."</td>";
                            echo "<tr>";
                        }
                        echo "</table>";
                    ?>
				</div>


<?php		
	include 'Footer.php';
	}
}
?>