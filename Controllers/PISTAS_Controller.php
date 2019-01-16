<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

include_once '../Models/PISTAS_Model.php';
include '../Views/PISTA_SHOWALL_View.php';
include '../Views/RESERVA_SHOWALL_View.php';
//include '../Views/PISTA_SEARCH_View.php';
//include '../Views/PISTA_ADD_View.php';
//include '../Views/PISTA_EDIT_View.php';
//include '../Views/PISTA_DELETE_View.php';
include '../Views/PISTA_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){
	
	 $idPista = $_REQUEST['idPista'];
	 $restriccion= $_REQUEST['restriccion'];
	 $nombre= $_REQUEST['nombre'];
	 $hora= $_REQUEST['hora'];
	 $fecha= $_REQUEST['fecha'];

	$action = $_REQUEST['action'];
	
	$PISTAS = new PISTAS_Model(
		 $idPista,
		 $restriccion,
		 $nombre,
		 $hora,
		 $fecha
	);

	return $PISTAS;
}
$lista = array('idPista','restriccion','nombre','hora','fecha');
$funcionalidad = "PISTAS";
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
					$PISTA = new PISTAS_Model('','','','','');
                    //Nueva vista
					$add = new ADD_PISTA('../Controllers/PISTAS_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$PISTA = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $PISTA->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/PISTAS_Controller.php');
					}
				
				}
			}//Si no tiene los permisos mostramos el mensaje de alerta
			else{
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'EDIT':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$PISTA = new PISTAS_Model($_REQUEST['login'],'','','','');
                    //Rellenas los datos con rellenadatos
					$valores = $PISTA->RellenaDatos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del PISTA una lista de checkbox para asignar/desasignar grupos
					new MODIFY_USER($valores,'./PISTAS_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$PISTA = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $PISTA->EDIT();
					
					new MESSAGE($respuesta,'./PISTAS_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('deportista')){
                //nuevo modelo de PISTAS
				$PISTAS = new PISTAS_Model($_REQUEST['idPista'], '', '', '','');
                //Recoge los datos de PISTAS
				$valores = $PISTAS->RellenaDatos();
                //Nueva vista
				new PISTA_SHOWCURRENT($valores,'../Controllers/PISTAS_Controller.php',$lista);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
				break;
		case 'PREVDAY':
		//Si no teine permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
					
                    //Sumamos un dia al recibido
					$siguiente=date("Y-m-d",strtotime($_REQUEST['fecha'])-86400);
					if(!($siguiente < date("Y-m-d",strtotime('2019-01-16')))){
						$PISTAS = new PISTAS_Model('','', '', '', $siguiente);
						$datos = $PISTAS->_SHOWALL();
						//var_dump($PISTAS);
						$pistas = $PISTAS->_SHOWNAMES();
						//Nueva vista
						new PISTA_SHOWALL($lista,$pistas, $datos, '../index.php');
					}else{
						new MESSAGE("No existen pistas disponibles","../Controllers/PISTAS_Controller.php");
					}
				}
				else{//Recoge los datos
					$PISTAS = get_data_form();
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			//Cambio de dia en el SHOWALL de PISTAS
		break;
		case 'NEXTDAY':
		//Si no teine permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Sumamos un dia al recibido
					$siguiente=date("Y-m-d",strtotime($_REQUEST['fecha'])+86400);
					if(!($siguiente > date("Y-m-d",strtotime('2019-01-29')))){
						$PISTAS = new PISTAS_Model('','', '', '', $siguiente);
						$datos = $PISTAS->_SHOWALL();
						//var_dump($PISTAS);
						$pistas = $PISTAS->_SHOWNAMES();
						//Nueva vista
						new PISTA_SHOWALL($lista,$pistas, $datos, '../index.php');
					}else{
						new MESSAGE("No existen pistas disponibles","../Controllers/PISTAS_Controller.php");
					}
				}
				else{//Recoge los datos
					$PISTAS = get_data_form();
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
			//Cambio de dia en el SHOWALL de PISTAS
		break;
		case 'RESERVE':
			if(comprobarRol('admin')){
				//nuevo modelo de PISTAS
					$PISTAS = new PISTAS_Model($_REQUEST['idPista'], '', $_REQUEST['nombre'], '','');
					//Ejecutamos la reserva
					$reserva = $PISTAS->RESERVE($_REQUEST['login']);
					new MESSAGE($reserva,'../Controllers/PISTAS_Controller.php');
			}else{
				if(comprobarRol('deportista')){
					//nuevo modelo de PISTAS
					$PISTAS = new PISTAS_Model($_REQUEST['idPista'], '', $_REQUEST['nombre'], '','');
					//Ejecutamos la reserva
					$reserva = $PISTAS->RESERVE($_SESSION['login']);
					new MESSAGE($reserva,'../Controllers/PISTAS_Controller.php');
				}else{//Si no tiene permisos
					new MESSAGE($alerta,'../Controllers/PISTAS_Controller.php');
				}
			}
		break;
		case 'RESERVAS':
		if(comprobarRol('admin')){
				//nuevo modelo de PISTAS
					$PISTAS = new PISTAS_Model('', '', '', '','');
					//Ejecutamos la reserva
					$lista = array('nombre','fecha','hora','Usuariologin');
					$reserva = $PISTAS->ALL_RESERVES();
					new RESERVA_SHOWALL($reserva,$lista,'../Controllers/PISTAS_Controller.php');
			}else{
				if(comprobarRol('deportista')){
					//nuevo modelo de PISTAS
					$PISTAS = new PISTAS_Model('', '', '', '','');
					//Ejecutamos la reserva
					$lista = array('nombre','fecha','hora');
					$reserva = $PISTAS->YOUR_RESERVES($_SESSION['login']);
					new RESERVA_SHOWALL($reserva,$lista,'../Controllers/PISTAS_Controller.php');
				}else{//Si no tiene permisos
					new MESSAGE($alerta,'../Controllers/PISTAS_Controller.php');
				}
			}
		break;
		case 'DEL_RESERVA':
			if(comprobarRol('deportista')){
                //nuevo modelo de PISTAS
				$PISTAS = new PISTAS_Model($_REQUEST['idPista'], '', $_REQUEST['nombre'], '','');
				   //Ejecutamos el borrado de la reserva
				if(comprobarRol('admin')){
					$reserva = $PISTAS->DEL_RESERVES_ADMIN();
				}else{
					$reserva = $PISTAS->DEL_RESERVES($_SESSION['login']);
				}
				new MESSAGE($reserva,'../Controllers/PISTAS_Controller.php?action=RESERVAS');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/PISTAS_Controller.php');
			}
		break;
		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$PISTAS = new PISTAS_Model('','', '', '', '2019-01-17');
				}
				else{//Recoge los datos
					$PISTAS = get_data_form();
				}
				//var_dump($PISTAS);
				//exit();
                //Llama al showall del modelo
				$datos = $PISTAS->_SHOWALL();
				//var_dump($PISTAS);
				$pistas = $PISTAS->_SHOWNAMES();
                //Nueva vista
				new PISTA_SHOWALL($lista,$pistas, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../index.php');
			}
	}

?>