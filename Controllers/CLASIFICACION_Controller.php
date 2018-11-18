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
	if($_REQUEST['action']='CLASIFICATION'){
		if(comprobarRol('deportista')){
			$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model('','','','',$_REQUEST['idCategoria'],$_REQUEST['idCampeonato'],'','','');
			$datos = $ENFRENTAMIENTOS->getResultados();
			//var_dump($datos);
			//g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`
			$parejasPuntos = array();
			unset($parejasPuntos);
			for($i = 0;$i<count($datos);$i++){
				$ganador = ganador($datos[$i]);

				$parejasPuntos[$ganador] +=3;
				if($datos[$i][11]!=$ganador){
					$parejasPuntos[$datos[$i][11]] +=1;
				}else{
					$parejasPuntos[$datos[$i][12]] +=1;
				}
			}
			//Array indice: idPareja ->valor:puntos en este grupo(Funcionando)
			var_dump($parejasPuntos);
			
			new CLASIFICACION_SHOWALL($datos,$parejasPuntos,'');
		}
	}
function ganador($partido){
	$set1 = $partido[8];
	$set2 = $partido[9];
	$set3 = $partido[10];
	$ganador = $partido[11];
	$sum =  ganadorSet($set1)+ganadorSet($set2)+ganadorSet($set3);
	if($sum<=2){
		return $partido[11];
	}else{
		return $partido[12];
	}
}

function ganadorSet($set){
	$arr1 = str_split($set);
	if($arr1[0]>$arr1[2]){
		return 0;
	}else{
		return 2;
	}
	if($set == null)
	return 0;
}
?>