<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

include_once '../Models/NOTICIAS_Model.php';
include '../Views/NOTICIA_SHOWALL_View.php';
include '../Views/NOTICIA_SEARCH_View.php';
include '../Views/NOTICIA_ADD_View.php';
include '../Views/NOTICIA_EDIT_View.php';
include '../Views/NOTICIA_DELETE_View.php';
include '../Views/NOTICIA_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idNoticia = $_REQUEST['idNoticia']||"";
	$imageURL = $_REQUEST['imageURL'];
	$enlace = $_REQUEST['enlace'];
	$texto = $_REQUEST['texto'];
	
	$action = $_REQUEST['action'];
	
	$NOTICIAS = new NOTICIAS_Model(
		$idNoticia, 
		$imageURL, 
		$enlace,
		$texto
	);

	return $NOTICIAS;
}
$lista = array('idNoticia', 'imageURL','enlace', 'texto');
//$funcionalidad = "NOTICIAS";
$alerta = "No tiene permisos para esta acción.";

//var_dump($_REQUEST['action']);
//exit();
if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

	Switch ($_REQUEST['action']){
		case 'ADD':
		//Comprobamos que tiene los permisos necesarios para realizar esta accion
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$NOTICIAS = new NOTICIAS_Model('','','','');
                    //Nueva vista
					$add = new ADD_NOTICIAS('../Controllers/NOTICIAS_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$NOTICIAS = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $NOTICIAS->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/NOTICIAS_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/NOTICIAS_Controller.php');
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
					$NOTICIAS = new NOTICIAS_Model($_REQUEST['idNoticia'], '', '', '');
					if(isset($_GET['borrar'])){//Si recibe orden de borrar
						//$respuesta1 =$NOTICIAS->DEL_IMG();
                        //Borra con delete del modelo
						$respuesta = $NOTICIAS->_DELETE();
						// mensaje con el volver y delete
						new MESSAGE($respuesta, '../Controllers/NOTICIAS_Controller.php');
					}
					else{//Si  vienen datos
                        //Rellenas los datos de NOTICIAS
						$valores = $NOTICIAS->RellenaDatos();
                        //Nueva vista
						new NOTICIAS_DELETEView($valores,'../Controllers/NOTICIAS_Controller.php',$lista,'','');
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
					$NOTICIAS = new NOTICIAS_Model($_REQUEST['idNoticia'],'','','');
                    //Rellenas los datos con rellenadatos
					$valores = $NOTICIAS->RellenaDatos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del NOTICIAS una lista de checkbox para asignar/desasignar grupos
					new MODIFY_NOTICIA($valores,'./NOTICIAS_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$NOTICIAS = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $NOTICIAS->EDIT();
					
					new MESSAGE($respuesta,'./NOTICIAS_Controller.php');
					
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
					$NOTICIAS = new NOTICIAS_Model('','','','');
                    //Nueva vista search
					new SEARCH_NOTICIA('../Controllers/NOTICIAS_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$NOTICIAS = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $NOTICIAS->SEARCH();
						//var_dump($datos);
                    //Nueva vista showall
					new NOTICIAS_SHOWALL(true,$lista, $datos, '../Controllers/NOTICIAS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('admin')){
                //nuevo modelo de NOTICIAS
				$NOTICIAS = new NOTICIAS_Model($_REQUEST['idNoticia'], '', '', '');
                //Recoge los datos de NOTICIAS
				$valores = $NOTICIAS->RellenaDatos();
                //Nueva vista
				new NOTICIAS_SHOWCURRENT($valores,'../Controllers/NOTICIAS_Controller.php',$lista);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
				break;
		default: //Default entra el showall
        //Si no tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$NOTICIAS = new NOTICIAS_Model('','', '', '');
				}
				else{//Recoge los datos
					$NOTICIAS = get_data_form();
				}
				//var_dump($NOTICIAS);
				//exit();
                //Llama al showall del modelo
				$datos = $NOTICIAS->_SHOWALL();
                //Nueva vista
				new NOTICIAS_SHOWALL(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
	}

?>