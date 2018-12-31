<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

include_once '../Models/ENFRENTAMIENTOS_Model.php';
include '../Views/ENFRENTAMIENTOS_SHOWALL_View.php';
include '../Views/ENFRENTAMIENTO_SEARCH_View.php';
//include '../Views/ENFRENTAMIENTO_DELETE_View.php';
include '../Views/ENFRENTAMIENTOS_MIS_View.php';
include '../Views/ENFRENTAMIENTO_FIJAR_HORA_View.php';
include '../Views/ENFRENTAMIENTO_RESULTADO_View.php';
include '../Views/ENFRENTAMIENTO_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idEnfrentamiento = $_REQUEST['idEnfrentamiento'];
	$idGrupo = $_REQUEST['idGrupo'];
	$idPareja1 = $_REQUEST['idPareja1'];
	$idPareja2 = $_REQUEST['idPareja2'];
	$GrupoIdCategoria = $_REQUEST['idCategoria'];
	$GrupoIdCampeonato = $_REQUEST['idCampeonato'];
	//$set1 = $_REQUEST['set1'];
	//$set2 = $_REQUEST['set2'];
	//$set3 = $_REQUEST['set3'];
	
	$action = $_REQUEST['action'];
	
	$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model(
		$idEnfrentamiento, 
		$idGrupo, 
		$idPareja1,
		$idPareja2, 
		$GrupoIdCategoria,
		$GrupoIdCampeonato,
		null,
		null,
		null
		
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

	Switch ($_REQUEST['action']){
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ENFRENTAMIENTO = new ENFRENTAMIENTOS_Model('','','','','','','','','');
					//Nueva vista search
					new SEARCH_ENFRENTAMIENTO('../Controllers/ENFRENTAMIENTOS_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$ENFRENTAMIENTOS = get_data_form();
                    //Si tiene grupo
						$datos = $ENFRENTAMIENTOS->SEARCH();
						var_dump($datos);
                    //Nueva vista showall
					new ENFRENTAMIENTO_SHOWALL(true,$lista, $datos, '../Controllers/ENFRENTAMIENTOS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('deportista')){
                //nuevo modelo de ENFRENTAMIENTOs
				$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamiento'], '', '', '','','','','','');
                //Recoge los datos de ENFRENTAMIENTOs
				$valores = $ENFRENTAMIENTOS->RellenaDatos();
				$hora = $ENFRENTAMIENTOS->getHora();
				$fecha = $ENFRENTAMIENTOS->getFecha();
				$asigned = $ENFRENTAMIENTOS->isAsigned();
                //Nueva vista
				$admin = false;
				if(comprobarRol('admin')){
					$admin = true;
				}else{
					$admin = false;
				}

				new ENFRENTAMIENTO_SHOWCURRENT($valores,'../Controllers/ENFRENTAMIENTOS_Controller.php',$lista,$admin,$hora,$fecha,$asigned);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
				break;
		case 'RESULTADO':
			//Si tiene permisos 
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio  
					//nuevo modelo de ENFRENTAMIENTOs
					$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamiento'], '', '', '','','','','','');
					//Recoge los datos de ENFRENTAMIENTOs
					$valores = $ENFRENTAMIENTOS->RellenaDatos();

					new RESULTADO_ENFRENTAMIENTO($valores,'../Controllers/ENFRENTAMIENTOS_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$enfrentamiento = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamiento'], '', '', '','','',$_REQUEST['set1'],$_REQUEST['set2'],$_REQUEST['set3']);
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					//var_dump($enfrentamiento);
					$respuesta = $enfrentamiento->RESULTADO();
					new MESSAGE($respuesta,'./ENFRENTAMIENTOS_Controller.php');
				}				
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
		break;
		case 'MIS-ENFRENTAMIENTOS':
			  //Si no tiene permisos
			  if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model('','', '', '', '','','','','');
				}
				//var_dump($ENFRENTAMIENTOS);
				//exit();
                //Llama al showall del modelo
				$datos = $ENFRENTAMIENTOS->getMisEnfrentamientos($_SESSION['login']);
				//var_dump($datos);
				//exit();
				$lista3 = array('idEnfrentamiento','login1', 'login2','P2login1','P2login2', 'genero','nivel', 'nombre','set1', 'set2','set3');
                //Nueva vista
				new MIS_ENFRENTAMIENTO_SHOWALL($lista3, $datos, '../ENFRENTAMIENTOS_Controller.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
		break;
		case 'ACEPTAR-HORA':
			if(comprobarRol('deportista')){
				$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamiento'], '', '', '','','','','','');
				$result = $ENFRENTAMIENTOS->aceptarPropuesta();
				new MESSAGE($result,'../index.php');
			}
		break;
		case 'CANCELAR-HORA':
			if(comprobarRol('deportista')){
					$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamiento'], '', '', '','','','','','');
					$result = $ENFRENTAMIENTOS->cancelPropuesta();
					new MESSAGE($result,'../index.php');
			}
		break;
		case 'PROPONER-HORA':
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ENFRENTAMIENTO = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamiento'],'', '', '', '','','','','');
					$horaActual = $ENFRENTAMIENTO->getHoraFecha();
					//Vista form para hora y fecha
					new HORA_ENFRENTAMIENTO('../ENFRENTAMIENTOS_Controller.php?action=SHOWCURRENT&idEnfrentamiento='.$_REQUEST['idEnfrentamiento'],$_REQUEST['idEnfrentamiento']);
				}else{
					$ENFRENTAMIENTO = new ENFRENTAMIENTOS_Model($_REQUEST['idEnfrentamiento'],'', '', '', '','','','','');
					$hora = $_REQUEST['hora'];
					$fecha = $_REQUEST['fecha'];
					if($ENFRENTAMIENTO->comprobarPista($hora,$fecha)){
						$result = $ENFRENTAMIENTO->insertHoraFecha($hora,$fecha);
					}else
						$result = "No hay pistas disponibles en esa hora/fecha";
					new MESSAGE($result,'../index.php');
				}
			}
		break;
		default: //Default entra el showall
        //Si no tiene permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ENFRENTAMIENTOS = new ENFRENTAMIENTOS_Model('','', '', '', '','','','','');
				}
				else{//Recoge los datos
					$ENFRENTAMIENTOS = get_data_form();
				}
				//var_dump($ENFRENTAMIENTOS);
				//exit();
                //Llama al showall del modelo
				$datos = $ENFRENTAMIENTOS->_SHOWALL();
                //Nueva vista
				new ENFRENTAMIENTO_SHOWALL(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
	}

?>