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
//include '../Views/ENFRENTAMIENTOS_SHOWALL_View.php';
//include '../Views/ENFRENTAMIENTO_SEARCH_View.php';
//include '../Views/ENFRENTAMIENTO_DELETE_View.php';
//include '../Views/ENFRENTAMIENTO_RESULTADO_View.php';
//include '../Views/ENFRENTAMIENTO_SHOWCURRENT_View.php';
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
		$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model('',$_REQUEST['idGrupo'],'','','',$_REQUEST['idCampeonato'],'','','');
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

		//Array indice: idPareja ->valor:puntos en este grupo(Funcionando)
		new CLASIFICACION_GRUPO_SHOWALL($parejas,'../Controllers/CLASIFICACION_Controller.php?action=CRUCES&idGrupo='.$_REQUEST['idGrupo'].'&idCampeonato='.$_REQUEST['idCampeonato']);
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
?>