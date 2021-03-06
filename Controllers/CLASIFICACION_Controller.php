<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

include_once '../Models/ENFRENTAMIENTOS_Model.php';
include '../Views/CLASIFICACION_SHOWALL_View.php';
include '../Views/CLASIFICACION_GRUPO_SHOWALL_View.php';
include '../Views/CLASIFICACION_PLAYOFF_View.php';
//include '../Views/ENFRENTAMIENTOS_SHOWALL_View.php';
//include '../Views/ENFRENTAMIENTO_SEARCH_View.php';
//include '../Views/ENFRENTAMIENTO_DELETE_View.php';
//include '../Views/ENFRENTAMIENTO_RESULTADO_View.php';
include '../Views/ENFRENTAMIENTO_SHOWCURRENT_View.php';
include '../Views/PLAYOFF_SHOWCURRENT_View.php';
include '../Views/PLAYOFF_RESULTADO_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idEnfrentamiento = $_REQUEST['idEnfrentamiento'];
	$idGrupo = $_REQUEST['idGrupo'];
	$idPareja1user = $_REQUEST['idPareja1'];
	$idPareja2 = $_REQUEST['idPareja2'];
	$GrupoIdCategoria = $_REQUEST['GrupoidCategoria'];
	$GrupoIdCampeonato = $_REQUEST['GrupoidCampeonato'];
	$set1 = $_REQUEST['set1'];
	$set2 = $_REQUEST['set2'];
	$set3 = $_REQUEST['set3'];
	
	$action = $_REQUEST['action'];
	
	$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model(
		$idEnfrentamiento, 
		$idGrupo, 
		$idPareja1,
		$idPareja2, 
		$GrupoIdCategoria,
		$GrupoIdCampeonato,
		$set1,
		$set2,
		$set3
	);

	return $ENFRENTAMIENTOS;
}
$lista = array('idEnfrentamiento', 'idGrupo','idPareja1', 'idPareja2', 'GrupoidCategoria','GrupoidCampeonato','set1','set2','set3');
$listaP = array('idEnfrentamientoRonda','set1','set2','set3','idPareja1', 'idPareja2','horaPropuesta','fechaPropuesta' ,'CategoriaidCategoria','CategoriaidCampeonato');
//$funcionalidad = "ENFRENTAMIENTOS";
$alerta = "No tiene permisos para esta acción.";

//var_dump($_REQUEST['action']);
//exit();
if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}
	if($_REQUEST['action']=='CRUCES'){
		if(comprobarRol('deportista')){
			$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model('',$_REQUEST['idGrupo'],'','','',$_REQUEST['idCampeonato'],'','','');
			$datos = $ENFRENTAMIENTOS->getResultados();

			//var_dump($datos);
			
			
			new CLASIFICACION_SHOWALL($datos,'../Controllers/GRUPOS_Controller.php');
		}
	}else if($_REQUEST['action']=='CLASIFICACION'){


		$parejas = getClas($_REQUEST['idGrupo'],$_REQUEST['idCampeonato']);


		//Array indice: idPareja ->valor:puntos en este grupo(Funcionando)
		new CLASIFICACION_GRUPO_SHOWALL($parejas,'../Controllers/CLASIFICACION_Controller.php?action=CRUCES&idGrupo='.$_REQUEST['idGrupo'].'&idCampeonato='.$_REQUEST['idCampeonato']);

	}else if($_REQUEST['action']=='PLAYOFF'){

		$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model('','','','',$_REQUEST['idCategoria'],$_REQUEST['idCampeonato'],'','','');

		$idgrupos = $ENFRENTAMIENTOS->getGrupos();

		if(empty($idgrupos)){
			
		}
		elseif(count($idgrupos)==2){
			$parejas = getClas($idgrupos[0][0],$_REQUEST['idCampeonato']);
			$parejas = array_slice($parejas, 0, 4);

			$parejas2 = getClas($idgrupos[1][0],$_REQUEST['idCampeonato']);
			$parejas2 = array_slice($parejas2, 0, 4);

			$aux= array_merge($parejas,$parejas2);

		} elseif (count($idgrupos)==4){

			$parejas = getClas($idgrupos[0][0],$_REQUEST['idCampeonato']);
			$parejas = array_slice($parejas, 0, 2);

			$parejas2 = getClas($idgrupos[1][0],$_REQUEST['idCampeonato']);
			$parejas2 = array_slice($parejas2, 0, 2);

			$parejas3 = getClas($idgrupos[2][0],$_REQUEST['idCampeonato']);
			$parejas3 = array_slice($parejas3, 0, 2);

			$parejas4 = getClas($idgrupos[3][0],$_REQUEST['idCampeonato']);
			$parejas4 = array_slice($parejas4, 0, 2);

			$aux= array_merge($parejas,$parejas2,$parejas3,$parejas4);

		}elseif(count($idgrupos)==8){

			$parejas = getClas($idgrupos[0][0],$_REQUEST['idCampeonato']);
			$parejas = array_slice($parejas, 0, 1);

			$parejas2 = getClas($idgrupos[1][0],$_REQUEST['idCampeonato']);
			$parejas2 = array_slice($parejas2, 0, 1);

			$parejas3 = getClas($idgrupos[2][0],$_REQUEST['idCampeonato']);
			$parejas3 = array_slice($parejas3, 0, 1);

			$parejas4 = getClas($idgrupos[3][0],$_REQUEST['idCampeonato']);
			$parejas4 = array_slice($parejas4, 0, 1);

			$parejas5 = getClas($idgrupos[4][0],$_REQUEST['idCampeonato']);
			$parejas5 = array_slice($parejas5, 0, 1);

			$parejas6 = getClas($idgrupos[5][0],$_REQUEST['idCampeonato']);
			$parejas6 = array_slice($parejas6, 0, 1);

			$parejas7 = getClas($idgrupos[6][0],$_REQUEST['idCampeonato']);
			$parejas7 = array_slice($parejas7, 0, 1);

			$parejas8 = getClas($idgrupos[7][0],$_REQUEST['idCampeonato']);
			$parejas8 = array_slice($parejas8, 0, 1);

			$aux= array_merge($parejas,$parejas2,$parejas3,$parejas4,$parejas5,$parejas6,$parejas7,$parejas8);
			shuffle($aux);

		}else {
			return false;	
		}

		for($i=0; $i < 8; $i++){
			$aux[$i][3] = "-/-/-"; 
		}
	if(comprobarRol('admin')){
		$respuesta = $ENFRENTAMIENTOS->ADD_CUARTOS($aux);

	}

		$cuartos = $ENFRENTAMIENTOS->getResultadosCuartos();

		if(ganadorPlayoff($cuartos[0]) AND ganadorPlayoff($cuartos[1]) AND ganadorPlayoff($cuartos[2]) AND ganadorPlayoff($cuartos[3]) AND !ganadorPlayoff($semis[0]) AND !ganadorPlayoff($semis[1]) ){

			$semis = $ENFRENTAMIENTOS->getResultadosSemis();

			if(empty($semis)){

				for($j=0;$j<4;$j++){
					$gan = ganadorPlayoff($cuartos[$j]);
					$pos = array_search($gan, array_column($aux, 'idPareja'));	
					unset($aux[$pos]);
					$aux = array_values($aux);
				}

				//INSERTAMOS LAS SEMIS y volvemos a consultar la tabla
				if(comprobarRol('admin')){
					shuffle($aux);
					$respuesta = $ENFRENTAMIENTOS->ADD_SEMIS($aux);
				}

				$semis = $ENFRENTAMIENTOS->getResultadosSemis();
			}
			else if (ganadorPlayoff($semis[0]) AND ganadorPlayoff($semis[1])){

				$final = $ENFRENTAMIENTOS->getResultadosFinal();

				if(empty($final)){

					for($j=0;$j<4;$j++){
						$gan = ganadorPlayoff($cuartos[$j]);
						$pos = array_search($gan, array_column($aux, 'idPareja'));	
						unset($aux[$pos]);
						$aux = array_values($aux);
					}

					for($j=0;$j<2;$j++){
						$gan = ganadorPlayoff($semis[$j]);
						$pos = array_search($gan, array_column($aux, 'idPareja'));	
						unset($aux[$pos]);
						$aux = array_values($aux);
					}

				//INSERTAMOS LAS FINALES y volvemos a consultar la tabla
					if(comprobarRol('admin')){
						$respuesta = $ENFRENTAMIENTOS->ADD_FINAL($aux);
					}

					$final = $ENFRENTAMIENTOS->getResultadosFinal();
				}
			}else{

			}

		}else{
		}
		
		//$semis = $ENFRENTAMIENTOS->getResultadosSemis();
		//$final = $ENFRENTAMIENTOS->getResultadosFinal();

		//$respuesta = $ENFRENTAMIENTOS->ADD_CUARTOS($aux);


		//Array indice: idPareja ->valor:puntos en este grupo(Funcionando)
		new CLASIFICACION_PLAYOFF($idgrupos,$aux,$cuartos,$semis,$final,'../Controllers/CATEGORIAS_Controller.php');
	}else if($_REQUEST['action']=='SHOWCURRENT'){
		if(comprobarRol('deportista')){
                //nuevo modelo de ENFRENTAMIENTOs
				$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamientoRonda'], '', '', '',$_REQUEST['idCategoria'],$_REQUEST['idCampeonato'],'','','');
                //Recoge los datos de ENFRENTAMIENTOs
				$valores = $ENFRENTAMIENTOS->RellenaDatosPlayoff();
				$hora = $ENFRENTAMIENTOS->getHoraEnfRonda();
				$fecha = $ENFRENTAMIENTOS->getFechaEnfRonda();
				$asigned = $ENFRENTAMIENTOS->isAsignedRonda();
                //Nueva vista
				$admin = false;
				if(comprobarRol('admin')){
					$admin = true;
				}else{
					$admin = false;
				}
				new PLAYOFF_SHOWCURRENT($valores,'../Controllers/CLASIFICACION_Controller.php?action=PLAYOFF&idCategoria='.$_REQUEST['idCategoria'].'&idCampeonato='.$_REQUEST['idCampeonato'].'',$listaP,$admin,$hora,$fecha,$asigned);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
	}else if($_REQUEST['action']=='RESULTADO'){
		if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio  
					//nuevo modelo de ENFRENTAMIENTOs
					$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamientoRonda'], '', '', '','','','','','');
					//Recoge los datos de ENFRENTAMIENTOs
					$valores = $ENFRENTAMIENTOS->RellenaDatosPlayoff();

					new RESULTADO_PLAYOFF($valores,'../Controllers/CATEGORIAS_Controller.php');
				}
				else{//Si no viene vaci
                    //Recoges los datos con el dataform
					$enfrentamiento = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamientoRonda'], '', '', '','','',$_REQUEST['set1'],$_REQUEST['set2'],$_REQUEST['set3']);
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					//var_dump($enfrentamiento);
					$respuesta = $enfrentamiento->RESULTADO_PLAYOFF();
					new MESSAGE($respuesta,'./CATEGORIAS_Controller.php');
				}				
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}

	}



	function ganador($partido){
		$set1 = $partido[8];
		$set2 = $partido[9];
		$set3 = $partido[10];
		$ganador = $partido[11];
		if($set1=="0-0"){
			return false;
		}else{
			$sum =  ganadorSet($set1)+ganadorSet($set2)+ganadorSet($set3);
			if($sum<=2){
				return $partido[11];
			}else{
				return $partido[12];
			}
		}
	}

		function ganadorPlayoff($partido){
		$set1 = $partido[7];
		$set2 = $partido[8];
		$set3 = $partido[9];
		$ganador = $partido[11];
		if($set1=="0-0"){
			return false;
		}else{
			$sum =  ganadorSet($set1)+ganadorSet($set2)+ganadorSet($set3);
			if($sum<=2){
				return $partido[11];
			}else{
				return $partido[10];
			}
		}
	}

	function ganadorSet($set){
		$arr1 = str_split($set);
		if($arr1[0]>$arr1[2]){
			return 0;
		}else if($arr1[0]<$arr1[2]){
			return 2;
		}else{
			return 0;
		}
		
	}

	function getpos($id, $array){

		$toret= null;
		$i=0;
		for($i=0;$i<count($array);$i++){

			if($id == $array[$i][0]){
				$toret = $i;
			}
		}

		return $toret;
	}


	function getClas($idGroup,$idChamp){
		$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model('',$idGroup,'','','',$idChamp,'','','');
		$parejas = $ENFRENTAMIENTOS->getParejas();
		$datos = $ENFRENTAMIENTOS->getResultadosGrupo();
		//g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
		$parejasPuntos = array();
		unset($parejasPuntos);
		for($j = 0; $j < count($parejas); $j++){
			array_push($parejas[$j],0);
		}

		for($i = 0;$i<count($datos);$i++){
			$ganador = ganador($datos[$i]);

			if($ganador){
				//$parejasPuntos[$ganadorString] +=3;
				//$parejas[$ganadorString][3] +=3;
				$a = getpos($ganador,$parejas);
				if(isset($parejas[$a][3])){
					//$parejasPuntos[$pareja2] +=1;{}
					$parejas[$a][3] +=3;}
				if($datos[$i][11]!=$ganador){
				$pareja1 = $datos[$i][11];
				//$parejasPuntos[$pareja1] +=1;
				//$parejas[$pareja1][3] +=1;
				$a = getpos($pareja1,$parejas);
				if(isset($parejas[$a][3])){
					//$parejasPuntos[$pareja2] +=1;{}
					$parejas[$a][3] +=1;}
				}else{
					$pareja2 = $datos[$i][12];
					$a = getpos($pareja2,$parejas);
					if(isset($parejas[$a][3])){
					//$parejasPuntos[$pareja2] +=1;{}
					$parejas[$a][3] +=1;}
				}
			}	

		}

		$isOrdered = false;
		while(!$isOrdered){
		$isOrdered = true;
			for($i = 1; $i < count($parejas); $i++){
				if($parejas[$i][3] > $parejas[$i - 1][3]){
					$aux = $parejas[$i];
					$parejas[$i] = $parejas[$i - 1];
					$parejas[$i - 1] = $aux;	
					$isOrdered = false;
			}
		}
		
	}

return $parejas;

	}
?>