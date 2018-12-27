<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

//MODELO CLASE
include_once '../Models/CLASES_Model.php';
include_once '../Models/PISTAS_Model.php';
//VISTAS CLASE
include '../Views/CLASE_SHOWALL_View.php';
include '../Views/CLASE_SEARCH_View.php';
include '../Views/CLASE_ADD_View.php';
include '../Views/CLASE_DELETE_View.php';
include '../Views/CLASE_EDIT_View.php';
include '../Views/CLASE_INSCRIBIRSE_View.php';
include '../Views/CLASE_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){
	$idEscuela = $_REQUEST['idEscuela'];
	$idClase = $_REQUEST['idClase'];
	$fecha = $_REQUEST['fecha'];
	$hora = $_REQUEST['hora'];
	$capacidadAlum = $_REQUEST['capacidadAlumnos'];
	$idPista = $_REQUEST['idPista'];
	$pistaNombre = $_REQUEST['Pistanombre'];
	$entrenador = $_REQUEST['entrenador'];
	
	$action = $_REQUEST['action'];
	
	$CLASES = new CLASES_Model(
		$idEscuela, 
		$idClase, 
		$fecha,
		$hora,
		$capacidadAlum,
		$idPista,
		$pistaNombre,
		$entrenador
	);

	return $CLASES;
}

$lista = array('idEscuela', 'idClase', 'fecha', 'hora', 'capacidadAlumnos', 'idPista', 'Pistanombre','entrenador');
$listaDepor =  array( 'nombre' , 'fecha', 'hora', 'capacidadAlumnos', 'Pistanombre', 'entrenador');
$lista2 = array('idCampeonato', 'nombre');
$funcionalidad = "CLASES";
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
					$CLASE = new CLASES_Model('','','','','','','','');
					//Datos campeonato
					$escuelas = $CLASE->getEscuelas();
					//var_dump($escuelas);
					//exit();
                    //Nueva vista
					$add = new ADD_CLASE($escuelas,'../Controllers/CLASES_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$CLASE = get_data_form();
					//var_dump($CLASE);
					//exit();
					//LLamas al add del modelo
					//Reservar pista para las clases antes de realizar inserccion de la clase
					$PISTAS = new PISTAS_Model($_REQUEST['idPista'], '', $_REQUEST['Pistanombre'], '','');
					//Ejecutamos la reserva
					$reserva = $PISTAS->RESERVE($_SESSION['login']);
					if($reserva = 'Reservado correctamente' ){
						$respuesta = $CLASE->ADD();
					}else{
						$respuesta = $reserva;
					}			
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/CLASES_Controller.php');
					}
				
				}
			}//Si no tiene los permisos mostramos el mensaje de alerta
			else{
				new MESSAGE($alerta,'../Controllers/CLASES_Controller.php');
			}
			break;
		case 'DELETE':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){
                    //Si viene vacio
                    //Nuevo modelo vacio
					$CLASES= new CLASES_Model('',$_REQUEST['idClase'], '', '', '','','','');
					if(isset($_GET['borrar'])){//Si recibe orden de borrar
						//$respuesta1 =$CAMPEONATOS->DEL_IMG();
						//Borra con delete del modelo
						$PISTAS = new PISTAS_Model($_REQUEST['idPista'], '', $_REQUEST['Pistanombre'], '','');
						//Ejecutamos la reserva
						$reserva = $PISTAS->DEL_RESERVES($_SESSION['login']);
						$respuesta = $CLASES->_DELETE();
						// mensaje con el volver y delete
						new MESSAGE($respuesta, '../Controllers/CLASES_Controller.php');
					}
					else{//Si  vienen datos
                        //Rellenas los datos de usuarios
						$valores = $CLASES->RellenaDatos();
                        //Nueva vista
						new CLASE_DELETE($valores,'../Controllers/CLASES_Controller.php',$listaDepor);
					}
				}
			}else{//Si no tiene vista
				new MESSAGE($alerta,'../Controllers/CLASES_Controller.php');
			}
			break;
		case 'EDIT':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$CLASE = new CLASES_Model('',$_REQUEST['idClase'],'','','','','','');
                    //Rellenas los datos con rellenadatos
					$valores = $CLASE->rellenaDatosTotal();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del usuario una lista de checkbox para asignar/desasignar grupos
					new CLASE_EDIT($valores,'./CLASES_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$CLASE = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $CLASE->EDIT();
					
					new MESSAGE($respuesta,'./CLASES_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CLASES_Controller.php');
			}
			break;
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
                    //Nueva vista search
					new SEARCH_CLASE('../Controllers/CLASES_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$CLASES = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $CLASES->SEARCH();
						//var_dump($datos);
						//exit();
                    //Nueva vista showall
					new CLASE_SHOWALL(true,$lista, $datos, '../Controllers/CLASES_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CLASES_Controller.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('deportista')){
                //nuevo modelo de usuarios
				$CLASES = new CLASES_Model('',$_REQUEST['idClase'], '', '', '','','','');
                //Recoge los datos de usuarios
				$valores = $CLASES->RellenaDatos();
				$admin = false;
				if(comprobarRol('admin'))
					$admin = true;
                //Nueva vista
				new CLASE_SHOWCURRENT($valores,'../Controllers/CLASES_Controller.php',$listaDepor,$admin);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CLASES_Controller.php');
			}
				break;
		case 'INSCRIBIR':
				if(!$_GET){	
					$CLASES = new CLASES_Model('',$_REQUEST['idClase'], '', '', '','','','');
					//Recoge los datos de usuarios
					$valores = $CLASES->RellenaDatos();
					$tope = $CLASES->isFull();
					$admin = false;
				if(comprobarRol('admin')){
					$admin = true;
				}
					new INSCRIBIRSE_CLASE('../Controllers/CLASES_Controller.php',$lista,$valores,$admin,$tope);
				}else{
					$idClase = $_REQUEST['idClase'];
					if(isset($_POST['login'])){
						$login = $_POST['login'];
					}else{
						$login = $_SESSION['login'];
					}
					$CLASES = new CLASES_Model('',$_REQUEST['idClase'], '', '', '','','','');
					$respuesta = $CLASES->inscribirse($login);
					new MESSAGE($respuesta,'../Controllers/CLASES_Controller.php');
				}
				break;

		case 'ASISTENCIA':
				if(comprobarRol('admin')){
					if (!$_POST){
					$login = $_SESSION['login'];
                    //Si viene vacio
                    //Nuevo modelo vacio
					$CLASES= new CLASES_Model('',$_REQUEST['idClase'], '', '', '','','','');
					$valores = $CLASE->asistencia($login);
				}
			}else{//Si no tiene permisos
					new MESSAGE($alerta,'../Controllers/CLASES_Controller.php');
				}
				break;
		
		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$CLASES = new CLASES_Model('','', '', '','','','','');
				}
				else{//Recoge los datos
					$CLASES = get_data_form();
				}
				$admin= false;
				if(comprobarRol('admin')){
					$admin = true;
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $CLASES->_SHOWALL();
                //Nueva vista
				new CLASE_SHOWALL(false,$listaDepor, $datos, '../index.php',$admin);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CLASES_Controller.php');
			}
	}

?>