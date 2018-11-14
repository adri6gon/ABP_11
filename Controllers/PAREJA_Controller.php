<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

include_once '../Models/PAREJA_Model.php';
include '../Views/PAREJA_SHOWALL_View.php';
include '../Views/PAREJA_SHOWALL_USER_View.php';
include '../Views/PAREJA_SEARCH_View.php';
include '../Views/PAREJA_ADD_View.php';
include '../Views/PAREJA_ADD_ADMIN_View.php';
include '../Views/PAREJA_EDIT_View.php';
include '../Views/PAREJA_DELETE_View.php';
include '../Views/PAREJA_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idpareja = $_REQUEST['idpareja'];
	$login1 = $_REQUEST['login1'];
	$login2 = $_REQUEST['login2'];
	$action = $_REQUEST['action'];
	
	$PAREJA = new PAREJA_Model(
		$idpareja, 
		$login1, 
		$login2
	);

	return $PAREJA;
}
$lista = array('idpareja', 'login1','login2');
$funcionalidad = "PAREJA";
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
					$usuario = new PAREJA_Model('','','');
                    //Nueva vista
					$add = new ADD_PAREJA_ADMIN('../Controllers/PAREJA_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$pareja = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $pareja->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/PAREJA_Controller.php');
					}
				
				}
			}
			if(comprobarRol('deportista')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$usuario = new PAREJA_Model('','','');
                    //Nueva vista
					$add = new ADD_PAREJA('../Controllers/PAREJA_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$pareja = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $pareja->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/PAREJA_Controller.php');
					}
				
				}
			}//Si no tiene los permisos mostramos el mensaje de alerta
			else{
				new MESSAGE($alerta,'../index.php');
			}

			break;
		case 'DELETE':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){
                    //Si viene vacio
                    //Nuevo modelo vacio
					$PAREJA = new PAREJA_Model($_REQUEST['idpareja'], '', '');
					if(isset($_GET['borrar'])){//Si recibe orden de borrar
						//$respuesta1 =$USUARIOS->DEL_IMG();
                        //Borra con delete del modelo
						$respuesta = $PAREJA->_DELETE();
						// mensaje con el volver y delete
						new MESSAGE($respuesta, '../Controllers/PAREJA_Controller.php');
					}
					else{//Si  vienen datos
                        //Rellenas los datos de usuarios
						$valores = $PAREJA->RellenaDatos();
                        //Nueva vista
						new PAREJA_DELETEView($valores,'../Controllers/PAREJA_Controller.php',$lista,'','');
					}
				}
			}else{//Si no tiene vista
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'EDIT':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$pareja = new PAREJA_Model($_REQUEST['idpareja'],'','');
                    //Rellenas los datos con rellenadatos
					$valores = $pareja->RellenaDatos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del usuario una lista de checkbox para asignar/desasignar grupos
					new MODIFY_PAREJA($valores,'./PAREJA_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$pareja = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $pareja->EDIT();
					
					new MESSAGE($respuesta,'./PAREJA_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$usuario = new PAREJA_Model('','','');
                    //Nueva vista search
					new SEARCH_PAREJA('../Controllers/PAREJA_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$PAREJAS = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $PAREJAS->SEARCH();
						//var_dump($datos);
                    //Nueva vista showall
					new PAREJA_SHOWALL(true,$lista, $datos, '../Controllers/PAREJA_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('deportista')){
                //nuevo modelo de usuarios
				$PAREJAS = new PAREJA_Model($_REQUEST['idpareja'], '', '');
                //Recoge los datos de usuarios
				$valores = $PAREJAS->RellenaDatos();
                //Nueva vista
				new PAREJA_SHOWCURRENT($valores,'../Controllers/PAREJA_Controller.php',$lista);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
				break;
		default: //Default entra el showall
        //Si no tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$PAREJAS = new PAREJA_Model('','','');
				}
				else{//Recoge los datos
					$PAREJAS = get_data_form();
				}
                //Llama al showall del modelo
				$datos = $PAREJAS->_SHOWALL();
                //Nueva vista
				new PAREJA_SHOWALL(false,$lista, $datos, '../index.php');
			}else{
				if(comprobarRol('deportista')){
				    if(!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$PAREJAS = new PAREJA_Model('','','');
				}
				else{//Recoge los datos
					$PAREJAS = get_data_form();
				}
                //Llama al showall del modelo
                $sesion = $_SESSION['login'];
				$datos = $PAREJAS->_SHOWALLUSER($sesion);
                //Nueva vista
				new PAREJA_SHOWALL_USER(false,$lista,$datos, '../index.php');
			}
	}
}
?>
