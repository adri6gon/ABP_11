<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

//MODELO ESCUELA
include_once '../Models/ESCUELAS_Model.php';
//VISTAS ESCUELA
include '../Views/ESCUELA_SHOWALL_View.php';
include '../Views/ESCUELA_SHOWALL_USER_View.php';
include '../Views/ESCUELA_SEARCH_View.php';
include '../Views/ESCUELA_ADD_View.php';
include '../Views/ESCUELA_DELETE_View.php';
include '../Views/ESCUELA_EDIT_View.php';
include '../Views/ESCUELA_SHOWCURRENT_View.php';
include '../Views/ESCUELA_INSCRIBIRSE_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idEscuela = $_REQUEST['idEscuela'];
	$nombreEscuela = $_REQUEST['nombre'];
	$fundacion = $_REQUEST['fundacion'];
	
	
	$action = $_REQUEST['action'];
	
	$ESCUELAS = new ESCUELAS_Model(
		$idEscuela, 
		$nombreEscuela, 
		$fundacion
	);

	return $ESCUELAS;
}

$lista = array('idEscuela', 'nombre','Fundacion');
$funcionalidad = "ESCUELAS";
$alerta = "No tiene permisos para esta acción.";

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
		case 'ADD':
		//Comprobamos que tiene los permisos necesarios para realizar esta accion
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ESCUELA = new ESCUELAS_Model('','','');
                    //Nueva vista
					$add = new ADD_ESCUELA('../Controllers/ESCUELAS_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$ESCUELA = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $ESCUELA->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/ESCUELAS_Controller.php');
					}
				
				}
			}//Si no tiene los permisos mostramos el mensaje de alerta
			else{
				new MESSAGE($alerta,'../Controllers/ESCUELAS_Controller.php');
			}
			break;

		case 'DELETE':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){
                    //Si viene vacio
                    //Nuevo modelo vacio
					$ESCUELAS = new ESCUELAS_Model($_REQUEST['idEscuela'], '', '');
					if(isset($_GET['borrar'])){//Si recibe orden de borrar
						//$respuesta1 =$ESCUELAS->DEL_IMG();
                        //Borra con delete del modelo
						$respuesta = $ESCUELAS->_DELETE();
						// mensaje con el volver y delete
						new MESSAGE($respuesta, '../Controllers/ESCUELAS_Controller.php');
					}
					else{//Si  vienen datos
                        //Rellenas los datos de usuarios
                        $valores = $ESCUELAS->RellenaDatos();
                        
                        //Nueva vista
						new ESCUELA_DELETE($valores,'../Controllers/ESCUELAS_Controller.php',$lista);
					}
				}
			}else{//Si no tiene vista
				new MESSAGE($alerta,'../Controllers/ESCUELAS_Controller.php');
			}
			break;
		case 'EDIT':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$ESCUELA = new ESCUELAS_Model($_REQUEST['idEscuela'],'','');
                    //Rellenas los datos con rellenadatos
					$valores = $ESCUELA->RellenaDatos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del usuario una lista de checkbox para asignar/desasignar grupos
					new ESCUELA_EDIT($valores,'./ESCUELAS_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$ESCUELA = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $ESCUELA->EDIT();
					
					new MESSAGE($respuesta,'./ESCUELAS_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/ESCUELAS_Controller.php');
			}
			break;
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ESCUELA = new ESCUELAS_Model('','','');
                    //Nueva vista search
					new SEARCH_ESCUELA('../Controllers/ESCUELAS_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$ESCUELAS = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $ESCUELAS->SEARCH();
						//var_dump($datos);
                    //Nueva vista showall
					new ESCUELA_SHOWALL(true,$lista, $datos, '../Controllers/ESCUELAS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/ESCUELAS_Controller.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('deportista')){
                //nuevo modelo de usuarios
				$ESCUELAS = new ESCUELAS_Model($_REQUEST['idEscuela'], '', '');
                //Recoge los datos de usuarios
				$valores = $ESCUELAS->RellenaDatos();
                //Nueva vista
				new ESCUELA_SHOWCURRENT($valores,'../Controllers/ESCUELAS_Controller.php',$lista);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/ESCUELAS_Controller.php');
			}
				break;
		default: //Default entra el showall
        //Si no teine permisos

			if(comprobarRol('admin')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ESCUELAS = new ESCUELAS_Model('','', '');
				}
				else{//Recoge los datos
					$ESCUELAS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $ESCUELAS->_SHOWALL();
                //Nueva vista
				new ESCUELA_SHOWALL(false,$lista, $datos, '../index.php');
			}else{
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$ESCUELAS = new ESCUELAS_Model('','', '');
				}
				else{//Recoge los datos
					$ESCUELAS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $ESCUELAS->_SHOWALL();
                //Nueva vista
				new ESCUELA_SHOWALL_USER(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/ESCUELAS_Controller.php');
			}
		}
	}
	

?>