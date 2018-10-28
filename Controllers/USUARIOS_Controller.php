<!--
Funcion del archivo: Controlador de las funciones ADD,EDIT,DELETE,SEARCH,SHOWALL,SHOWCURRENT de USUARIOS de la web.
Autor: j0z5zs
Fecha: 23/12/17
-->
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
	$DNI = $_REQUEST['DNI'];
	$emailuser = $_REQUEST['email'];
	$nombreuser = $_REQUEST['nombre'];
	$apellidosuser = $_REQUEST['apellidos'];
	$telefonouser = $_REQUEST['telefono'];
	$direccion = $_REQUEST['direccion'];
	/* if($_FILES){
		$fotopersonal = '../Files/'.$_REQUEST['login'].'-'.$_FILES['fotopersonal']['name'];
	}else{
		$fotopersonal = $_REQUEST['fotopersonal'];
	} */
	$action = $_REQUEST['action'];
	
	$USUARIOS = new USUARIOS_Model(
		$login, 
		$password, 
		$DNI,
		$emailuser,
		$nombreuser, 
		$apellidosuser,
		$telefonouser, 
		$direccion);

	return $USUARIOS;
}
$lista = array('login', 'DNI', 'Nombre', 'Apellidos', 'Telefono', 'Correo', 'Direccion');
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
			if(comprobarPermisos($_REQUEST['action'],$funcionalidad)){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$usuario = new USUARIOS_Model('','','','','','','','');
                    //Recoge el grupo del usuario
					$grupos = $usuario->grupos();
                    //Nueva vista
					$add = new ADD_USUARIO('../Controllers/USUARIOS_Controller.php',$grupos);
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$usuario = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $usuario->ADD();
                    //Para cada grupo que tiene lo asignas
					foreach($_REQUEST['grupos'] as $grupo){
							$respuesta2 = $usuario->asigGrupo($grupo);
					}				
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
			if(comprobarPermisos($_REQUEST['action'],$funcionalidad)){
				if (!$_POST){
                    //Si viene vacio
                    //Nuevo modelo vacio
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '','', '', '','');
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
			if(comprobarPermisos($_REQUEST['action'],$funcionalidad)){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$usuario = new USUARIOS_Model($_REQUEST['login'],'','','','','','','');
                    //Rellenas los datos con rellenadatos
					$valores = $usuario->RellenaDatos();
                    //Coges los grupos en los que esta asignados
					$gruposAsig = $usuario->gruposAsig();
                    //Coges los grupos
					$grupos = $usuario->grupos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del usuario una lista de checkbox para asignar/desasignar grupos
					new MODIFY_USER($valores,'./USUARIOS_Controller.php',$gruposAsig,$grupos);
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$usuario = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $usuario->EDIT();
					//$respuesta2 = $usuario->asigGrupo($IdGrupo);
					$res = $usuario->deletegrupos();
					if($res){//Si res true
                        //Para cada grupo
						foreach($_REQUEST['grupos'] as $grupo){
                            //recoge los grupos asign
							$respuesta2 = $usuario->asigGrupo($grupo);
						}
					}
					new MESSAGE($respuesta,'./USUARIOS_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarPermisos($_REQUEST['action'],$funcionalidad)){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$usuario = new USUARIOS_Model('','','','','','','','');
                    //Devuelve grupos usuario
					$grupos = $usuario->grupos();
                    //Nueva vista search
					new SEARCH_USUARIO('../Controllers/USUARIOS_Controller.php',$grupos);
				}
				else{
                    //Recoge los datos del data form
					$USUARIOS = get_data_form();
					//var_dump($USUARIOS);
					//exit();
                    //Si tiene grupo
					if(isset($_REQUEST['grupo'])){
                        //Busca por el grupo
						$datos = $USUARIOS->SEARCH($_REQUEST['grupo']);
					}else{//Si no pone a null
						$datos = $USUARIOS->SEARCH(null);
					}
                    //Nueva vista showall
					new USUARIO_SHOWALL(true,$lista, $datos, '../Controllers/USUARIOS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarPermisos($_REQUEST['action'],$funcionalidad)){
                //nuevo modelo de usuarios
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'], '', '', '','', '', '','');
                //Recoge los datos de usuarios
				$valores = $USUARIOS->RellenaDatos();
                //Nueva vista
				new USUARIO_SHOWCURRENT($valores,'../Controllers/USUARIOS_Controller.php',$lista,'','');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
				break;
		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarPermisos('SHOWALL',$funcionalidad)){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$USUARIOS = new USUARIOS_Model('','', '', '', '', '', '', '');
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