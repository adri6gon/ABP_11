<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

include_once '../Models/USUARIOS_Model.php';
include '../Views/USUARIO_SHOWALL_View.php';
include '../Views/USUARIO_SEARCH_View.php';
include '../Views/USUARIO_ADD_View.php';
include '../Views/USUARIO_EDIT_View.php';
include '../Views/USUARIO_DELETE_View.php';
include '../Views/USUARIO_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$login = $_REQUEST['login'];
	$password = $_REQUEST['contrasena'];
	$roluser = $_REQUEST['rol'];
	$nombreuser = $_REQUEST['nombre'];
	$apellidosuser = $_REQUEST['apellidos'];
	
	/* if($_FILES){
		$fotopersonal = '../Files/'.$_REQUEST['login'].'-'.$_FILES['fotopersonal']['name'];
	}else{
		$fotopersonal = $_REQUEST['fotopersonal'];
	} */
	$action = $_REQUEST['action'];
	
	$USUARIOS = new USUARIOS_Model(
		$login, 
		$password, 
		$roluser,
		$nombreuser, 
		$apellidosuser
	);

	return $USUARIOS;
}
$lista = array('login', 'password','rol', 'nombre', 'apellidos');
$funcionalidad = "USUARIOS";
$alerta = "No tiene permisos para esta acción.";

//var_dump($_REQUEST['action']);
//exit();
if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

	Switch ($_REQUEST['action']){
		case 'ADD':
		//Comprobamos que tiene los permisos necesarios para realizar esta accion
			if(comprobarRol($_REQUEST['action'])){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$usuario = new USUARIOS_Model('','','','','');
                    //Nueva vista
					$add = new ADD_USUARIO('../Controllers/USUARIOS_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$usuario = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $usuario->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/USUARIOS_Controller.php');
					}
				
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
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '','');
					if(isset($_GET['borrar'])){//Si recibe orden de borrar
						//$respuesta1 =$USUARIOS->DEL_IMG();
                        //Borra con delete del modelo
						$respuesta = $USUARIOS->_DELETE();
						// mensaje con el volver y delete
						new MESSAGE($respuesta, '../Controllers/USUARIOS_Controller.php');
					}
					else{//Si  vienen datos
                        //Rellenas los datos de usuarios
						$valores = $USUARIOS->RellenaDatos();
                        //Nueva vista
						new USUARIO_DELETEView($valores,'../Controllers/USUARIOS_Controller.php',$lista,'','');
					}
				}
			}else{//Si no tiene vista
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'EDIT':
        //Si tiene permisos
			if(comprobarRol($_REQUEST['action'])){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$usuario = new USUARIOS_Model($_REQUEST['login'],'','','','');
                    //Rellenas los datos con rellenadatos
					$valores = $usuario->RellenaDatos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del usuario una lista de checkbox para asignar/desasignar grupos
					new MODIFY_USER($valores,'./USUARIOS_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$usuario = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $usuario->EDIT();
					
					new MESSAGE($respuesta,'./USUARIOS_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol($_REQUEST['action'])){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$usuario = new USUARIOS_Model('','','','','');
                    //Nueva vista search
					new SEARCH_USUARIO('../Controllers/USUARIOS_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$USUARIOS = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $USUARIOS->SEARCH();
						//var_dump($datos);
                    //Nueva vista showall
					new USUARIO_SHOWALL(true,$lista, $datos, '../Controllers/USUARIOS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(/*comprobarPermisos($_REQUEST['action'],$funcionalidad)*/comprobarRol($_REQUEST['action'])){
                //nuevo modelo de usuarios
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '','');
                //Recoge los datos de usuarios
				$valores = $USUARIOS->RellenaDatos();
                //Nueva vista
				new USUARIO_SHOWCURRENT($valores,'../Controllers/USUARIOS_Controller.php',$lista);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
				break;
		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarRol($_REQUEST['action'])){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$USUARIOS = new USUARIOS_Model('','', '', '', '');
				}
				else{//Recoge los datos
					$USUARIOS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $USUARIOS->_SHOWALL();
                //Nueva vista
				new USUARIO_SHOWALL(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
	}

?>