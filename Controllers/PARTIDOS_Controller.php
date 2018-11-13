<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

//MODELO CAMPEONATO
include_once '../Models/PARTIDOS_Model.php';
//VISTAS CAMPEONATO
 include '../Views/PARTIDO_SHOWALL_View.php';
// include '../Views/CAMPEONATO_SEARCH_View.php';
include '../Views/PARTIDO_ADD_View.php';
// include '../Views/CAMPEONATO_EDIT_View.php';
// include '../Views/CAMPEONATO_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$Usuariologin = $_SESSION['login'];
	$fecha = $_REQUEST['fecha'];
    $pista = $_REQUEST['pista'];
	
	$PARTIDO = new PARTIDOS_Model(
		'', 
		$Usuariologin, 
		$fecha,
        '',
        $pista,
        ''
	);

	return $PARTIDO;
}

$lista = array('idPartido', 'Usuariologin','fecha', 'hora', 'promo');
$funcionalidad = "PARTIDOS";
$alerta = "No tiene permisos para esta acción.";

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
		case 'ADD':
        //Comprobamos que tiene los permisos necesarios para realizar esta accion
			if(comprobarRol($_REQUEST['action'])){
                if(!$_POST){//Si viene vacio
                    $partido = new PARTIDOS_Model('','','','', '','');
                    $pistas = $partido->_SHOWPISTASFREE();
                    //Nueva vista
					new ADD_PARTIDO($pistas,'../Controllers/PARTIDOS_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
                    $partido = get_data_form();
                    $respuesta = $partido->ADD();
                    new MESSAGE($respuesta,'../Controllers/PARTIDOS_Controller.php');

				}
			}//Si no tiene los permisos mostramos el mensaje de alerta
			else{
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'DELETE':
        //Si tiene permisos
			if(comprobarRol($_REQUEST['action'])){
				if (!$_POST){
                    //Si viene vacio
                    //Nuevo modelo vacio
					$PARTIDO = new PARTIDOS_Model($_REQUEST['idPartido'], '', '', '','','');
                    //Borra con delete del modelo
					$respuesta = $PARTIDO->_DELETE();
					// mensaje con el volver y delete
					new MESSAGE($respuesta, '../Controllers/PARTIDOS_Controller.php');
					
				}
			}else{//Si no tiene vista
				new MESSAGE($alerta,'../index.php');
			}
			break;

		case 'SEARCH':
        // //Si tiene permisos
		// 	if(comprobarRol($_REQUEST['action'])){
		// 		if (!$_POST){//Si viene vacio
        //             //Nuevo modelo vacio
		// 			$campeonato = new CAMPEONATOS_Model('','','','');
        //             //Nueva vista search
		// 			new SEARCH_CAMPEONATO('../Controllers/CAMPEONATOS_Controller.php');
		// 		}
		// 		else{
        //             //Recoge los datos del data form
		// 			$CAMPEONATOS = get_data_form();
		// 			//exit();
        //             //Si tiene grupo
		// 				$datos = $CAMPEONATOS->SEARCH();
		// 				//var_dump($datos);
        //             //Nueva vista showall
		// 			new CAMPEONATO_SHOWALL(true,$lista, $datos, '../Controllers/CAMPEONATOS_Controller.php?action=SEARCH');
		// 		}
		// 	}else{//Si no tiene permisos
		// 		new MESSAGE($alerta,'../index.php');
		// 	}
		// 	break;
		case 'PROMOCIONAR':
        //Si tiene permisos 
			if(comprobarRol($_REQUEST['action'])){
                //nuevo modelo de usuarios
				$PARTIDO = new PARTIDOS_Model($_REQUEST['idPartido'], '', '', '','','');
                //Recoge los datos de usuarios
				$mensaje = $PARTIDO->Promocionar();
                //Nueva vista
				new MESSAGE($mensaje,'../Controllers/PARTIDOS_Controller.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/PARTIDOS_Controller.php');
			}
                break;
            case 'DESPROMOCIONAR':
                //Si tiene permisos 
                    if(comprobarRol($_REQUEST['action'])){
                        //nuevo modelo de usuarios
                        $PARTIDO = new PARTIDOS_Model($_REQUEST['idPartido'], '', '', '','','');
                        //Recoge los datos de usuarios
                        $mensaje = $PARTIDO->Despromocionar();
                        //Nueva vista
                        new MESSAGE($mensaje,'../Controllers/PARTIDOS_Controller.php');
                    }else{//Si no tiene permisos
                        new MESSAGE($alerta,'../Controllers/PARTIDOS_Controller.php');
                    }
                        break;
		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarRol($_REQUEST['action'])){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
                    $PARTIDOS = new PARTIDOS_Model('','', '', '','','');	
				}
				else{//Recoge los datos
					$PARTIDOS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
                $datos = $PARTIDOS->_SHOWALL();
               //Nueva vista
			    new PARTIDO_SHOWALL(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
	}

?>