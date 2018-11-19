<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

//MODELO CAMPEONATO
include_once '../Models/CAMPEONATOS_Model.php';
//VISTAS CAMPEONATO
include '../Views/CAMPEONATO_SHOWALL_View.php';
include '../Views/CAMPEONATO_SHOWALL_USER_View.php';
include '../Views/CAMPEONATO_SEARCH_View.php';
include '../Views/CAMPEONATO_ADD_View.php';
include '../Views/CAMPEONATO_DELETE_View.php';
include '../Views/CAMPEONATO_EDIT_View.php';
include '../Views/CAMPEONATO_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idcam = $_REQUEST['idCampeonato'];
	$nombrecam = $_REQUEST['nombre'];
	$fechainiins = $_REQUEST['fechaIniInscripcion'];
	$fechafinins = $_REQUEST['fechaFinInscripcion'];
	
	$action = $_REQUEST['action'];
	
	$CAMPEONATOS = new CAMPEONATOS_Model(
		$idcam, 
		$nombrecam, 
		$fechainiins,
		$fechafinins
	);

	return $CAMPEONATOS;
}

$lista = array('idCampeonato', 'nombre','fechaIniInscripcion', 'fechaFinInscripcion');
$funcionalidad = "CAMPEONATOS";
$alerta = "No tiene permisos para esta acción.";

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
		case 'ADD':
		//Comprobamos que tiene los permisos necesarios para realizar esta accion
			if(comprobarRol($_REQUEST['admin'])){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$campeonato = new CAMPEONATOS_Model('','','','');
                    //Nueva vista
					$add = new ADD_CAMPEONATO('../Controllers/CAMPEONATOS_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$campeonato = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $campeonato->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/CAMPEONATOS_Controller.php');
					}
				
				}
			}//Si no tiene los permisos mostramos el mensaje de alerta
			else{
				new MESSAGE($alerta,'../index.php');
			}
			break;

		case 'DELETE':
        //Si tiene permisos
			if(comprobarRol($_REQUEST['admin'])){
				if (!$_POST){
                    //Si viene vacio
                    //Nuevo modelo vacio
					$CAMPEONATOS = new CAMPEONATOS_Model($_REQUEST['idCampeonato'], '', '', '');
					if(isset($_GET['borrar'])){//Si recibe orden de borrar
						//$respuesta1 =$CAMPEONATOS->DEL_IMG();
                        //Borra con delete del modelo
						$respuesta = $CAMPEONATOS->_DELETE();
						// mensaje con el volver y delete
						new MESSAGE($respuesta, '../Controllers/CAMPEONATOS_Controller.php');
					}
					else{//Si  vienen datos
                        //Rellenas los datos de usuarios
						$valores = $CAMPEONATOS->RellenaDatos();
                        //Nueva vista
						new CAMPEONATO_DELETE($valores,'../Controllers/CAMPEONATOS_Controller.php',$lista,'','');
					}
				}
			}else{//Si no tiene vista
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'EDIT':
        //Si tiene permisos
			if(comprobarRol($_REQUEST['admin'])){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$campeonato = new CAMPEONATOS_Model($_REQUEST['idCampeonato'],'','','');
                    //Rellenas los datos con rellenadatos
					$valores = $campeonato->RellenaDatos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del usuario una lista de checkbox para asignar/desasignar grupos
					new CAMPEONATO_EDIT($valores,'./CAMPEONATOS_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$campeonato = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $campeonato->EDIT();
					
					new MESSAGE($respuesta,'./CAMPEONATOS_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$campeonato = new CAMPEONATOS_Model('','','','');
                    //Nueva vista search
					new SEARCH_CAMPEONATO('../Controllers/CAMPEONATOS_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$CAMPEONATOS = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $CAMPEONATOS->SEARCH();
						//var_dump($datos);
                    //Nueva vista showall
					new CAMPEONATO_SHOWALL(true,$lista, $datos, '../Controllers/CAMPEONATOS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol($_REQUEST['deportista'])){
                //nuevo modelo de usuarios
				$CAMPEONATOS = new CAMPEONATOS_Model($_REQUEST['idCampeonato'], '', '', '');
                //Recoge los datos de usuarios
				$valores = $CAMPEONATOS->RellenaDatos();
                //Nueva vista
				new CAMPEONATO_SHOWCURRENT($valores,'../Controllers/CAMPEONATOS_Controller.php',$lista);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
				break;
		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarRol('admin')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$CAMPEONATOS = new CAMPEONATOS_Model('','', '', '');
				}
				else{//Recoge los datos
					$CAMPEONATOS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $CAMPEONATOS->_SHOWALL();
                //Nueva vista
				new CAMPEONATO_SHOWALL(false,$lista, $datos, '../index.php');
			}else{
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$CAMPEONATOS = new CAMPEONATOS_Model('','', '', '');
				}
				else{//Recoge los datos
					$CAMPEONATOS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $CAMPEONATOS->_SHOWALL();
                //Nueva vista
				new CAMPEONATO_SHOWALL_USER(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
		}
	}
	

?>