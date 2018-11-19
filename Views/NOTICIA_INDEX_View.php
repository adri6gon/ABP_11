<?php

class NOTICIA_INDEX_View {
//Constructor
	function __construct($datos, $lista, $partidos, $numInscritos, $selectUsers){
		//Enlace de vuelta atras
		$this->datos=$datos;
		$this->lista = $lista;
		$this->partidos = $partidos;
		$this->numInscritos = $numInscritos;
		$this->selectUsers = $selectUsers;
		$this->render();
	}
//Funcion que monta la vista
	function render(){
		include 'Header.php';
?>
<section class="noticias" <?php 
	if(!isset($_SESSION['login'])){
		echo 'style="margin-top:80px; margin-left:20%;"';	
	}else{
		echo 'style="margin-top:80px;"';
	}
	
echo "style='margin-top:80px;'";?>>
	<?php
		for($j=0;$j<count($this->datos);$j++){
			
			 echo '<div class="noticia">
			 		<img src="'.$this->datos[$j][($this->lista)[0]].'"><br>';
			 echo '<a href="'.$this->datos[$j][($this->lista)[1]].'">Enlace<a><br>';	
			 echo '<p>'.$this->datos[$j][($this->lista)[2]].'</p>';
			 echo '</div>';						
					 
		}

		for($j=0;$j<count($this->partidos);$j++){ ?>
			
			<div class="noticia">
				<br><img src="/ABP_11/Views/images/matchpadel.jpg" width=130px ><br>
				<p><strong>Fecha: </strong> <?= $this->partidos[$j]["fecha"] ?> </p>
				<p><strong>Hora:</strong> <?= $this->partidos[$j]["hora"] ?> </p>
				<p><strong>Pista: </strong><?= $this->partidos[$j]["Pistanombre"] ?> </p>
				<?php if(isset($_SESSION['login'])){ 
					// echo $flag;
					 ?>
					 
					<?php 
					$insc=false;
					$cant=0;
					$participado = false;
					if($this->numInscritos != null){
						for($i=0;$i<count($this->numInscritos);$i++){
												// echo $this->numInscritos[$i]["partido"];
												// echo $this->partidos[$j]["idPartido"];
												// 	var_dump(!$flag);
												if(($this->numInscritos[$i]["partido"] == $this->partidos[$j]["idPartido"])){
													$insc=true;
													$cant=$this->numInscritos[$i]["cont"];
												}
											}
					}
					if($this->selectUsers != null){
						for($i=0;$i<count($this->selectUsers);$i++){
												if($this->selectUsers[$i]["login"] == $_SESSION['login'] && $this->partidos[$j]["idPartido"] == $this->selectUsers[$i]["partido"]){
													$participado = true;
												}
											}
					}
					


					
					if(!$insc){?>
						<a href="./PARTIDOS_Controller.php?action=INSCRIBIR&idPartido=<?= $this->partidos[$j]["idPartido"] ?>">Inscribirse<a><br>	
					<?php
					}else if($cant < 4 ){ 
						if($participado){ ?>
							<a href="./PARTIDOS_Controller.php?action=DESINSCRIBIR&idPartido=<?= $this->partidos[$j]["idPartido"] ?>">Desinscribirse<a><br>	
						<?php } else { ?>
							<a href="./PARTIDOS_Controller.php?action=INSCRIBIR&idPartido=<?= $this->partidos[$j]["idPartido"] ?>">Inscribirse<a><br>	
						<?php }
					}else if($cant == 4 && $participado){
						?>
							<a href="./PARTIDOS_Controller.php?action=DESINSCRIBIR&idPartido=<?= $this->partidos[$j]["idPartido"] ?>">Desinscribirse<a><br>	
						<?php
					}
					 
				} ?>
			</div>						
					
	   <?php 
		}


	?>
</section>

<?php		
	include 'Footer.php';
	}
}
?>