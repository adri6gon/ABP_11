<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

//MODELO CATEGORIA
include_once '../Models/CATEGORIAS_Model.php';
//VISTAS CATEGORIA
include '../Views/CATEGORIA_SHOWALL_View.php';
include '../Views/CATEGORIA_SEARCH_View.php';
include '../Views/CATEGORIA_ADD_View.php';
include '../Views/CATEGORIA_DELETE_View.php';
include '../Views/CATEGORIA_EDIT_View.php';
include '../Views/CATEGORIA_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idcat = $_REQUEST['idCategoria'];
	$genero = $_REQUEST['genero'];
	$nivel = $_REQUEST['nivel'];
	$idcam = $_REQUEST['idCampeonato'];
	
	$action = $_REQUEST['action'];
	
	$CATEGORIAS = new CATEGORIAS_Model(
		$idcat, 
		$genero, 
		$nivel,
		$idcam
	);

	return $CATEGORIAS;
}

$lista = array('idCategoria', 'genero','nivel', 'idCampeonato');
$lista2 = array('idCampeonato', 'nombre');
$funcionalidad = "CATEGORIAS";
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
					$categoria = new CATEGORIAS_Model('','','','');
					//Datos campeonato
                    $datos = $categoria->RellenaDatosCampeonato();
                    //Nueva vista
					$add = new ADD_CATEGORIA($datos,$lista2,'../Controllers/CATEGORIAS_Controller.php');
				}else{//Si no viene vacio
                    //Recoge los datos con getdataform
					$categoria = get_data_form();
                    //LLamas al add del modelo
					$respuesta = $categoria->ADD();				
					include_once '../Functions/Authentication.php';
					if(!IsAuthenticated()){//Si no esta autenticado
						new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
					}else{//Si esta autenticado
						new MESSAGE($respuesta,'../Controllers/CATEGORIAS_Controller.php');
					}
				
				}
			}//Si no tiene los permisos mostramos el mensaje de alerta
			else{
				new MESSAGE($alerta,'../Controllers/CATEGORIAS_Controller.php');
			}
			break;
		case 'DELETE':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if (!$_POST){
                    //Si viene vacio
                    //Nuevo modelo vacio
					$CATEGORIAS= new CATEGORIAS_Model($_REQUEST['idCategoria'], '', '', '');
					if(isset($_GET['borrar'])){//Si recibe orden de borrar
						//$respuesta1 =$CAMPEONATOS->DEL_IMG();
                        //Borra con delete del modelo
						$respuesta = $CATEGORIAS->_DELETE();
						// mensaje con el volver y delete
						new MESSAGE($respuesta, '../Controllers/CATEGORIAS_Controller.php');
					}
					else{//Si  vienen datos
                        //Rellenas los datos de usuarios
						$valores = $CATEGORIAS->RellenaDatos();
                        //Nueva vista
						new CATEGORIA_DELETE($valores,'../Controllers/CATEGORIAS_Controller.php',$lista,'','');
					}
				}
			}else{//Si no tiene vista
				new MESSAGE($alerta,'../Controllers/CATEGORIAS_Controller.php');
			}
			break;
		case 'EDIT':
        //Si tiene permisos
			if(comprobarRol('admin')){
				if(!$_POST){//Si viene vacio
                    //Nuevo modelo vaci0
					$categoria = new CATEGORIAS_Model($_REQUEST['idCategoria'],'','','');
                    //Rellenas los datos con rellenadatos
					$valores = $categoria->RellenaDatos();
					
					//En el edit tenemos que poder asignar y desasignar grupos a un user por eso le pasamos 2 arrays:el de grupos que tiene asignados y el de todos los grupos
					//La vista debe tener despues de los datos del usuario una lista de checkbox para asignar/desasignar grupos
					new CATEGORIA_EDIT($valores,'./CATEGORIAS_Controller.php');
				}
				else{//Si no viene vacio
                    //Recoges los datos con el dataform
					$categoria = get_data_form();
					//var_dump($_REQUEST['grupos']);
					//exit();
                    //Haces el edit del modelo
					$respuesta = $categoria->EDIT();
					
					new MESSAGE($respuesta,'./CATEGORIAS_Controller.php');
					
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CATEGORIAS_Controller.php');
			}
			break;
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$categoria = new CATEGORIAS_Model('','','','');
					$datos = $categoria->RellenaDatosCampeonato();
                    //Nueva vista search
					new SEARCH_CATEGORIA($datos,$lista2,'../Controllers/CATEGORIAS_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$CATEGORIAS = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $CATEGORIAS->SEARCH();
						//var_dump($datos);
                    //Nueva vista showall
					new CATEGORIA_SHOWALL(true,$lista, $datos, '../Controllers/CATEGORIAS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CATEGORIAS_Controller.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('deportista')){
                //nuevo modelo de usuarios
				$CATEGORIAS = new CATEGORIAS_Model($_REQUEST['idCategoria'], '', '', '');
                //Recoge los datos de usuarios
				$valores = $CATEGORIAS->RellenaDatos();
                //Nueva vista
				new CATEGORIA_SHOWCURRENT($valores,'../Controllers/CATEGORIAS_Controller.php',$lista);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CATEGORIAS_Controller.php');
			}
				break;
		case 'GENERAR':
				if(comprobarRol('admin')){
                    	//Recoge los datos con getdataform
						$CATEGORIAS = new CATEGORIAS_Model($_REQUEST['idCategoria'], '', '', '');
                    	//LLamas al add del modelo
						$respuesta = $CATEGORIAS->GENERATE_GROUPS();				
						include_once '../Functions/Authentication.php';
						if(!IsAuthenticated()){//Si no esta autenticado
							new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
						}else{//Si esta autenticado
							new MESSAGE($respuesta,'../Controllers/CATEGORIAS_Controller.php');
						}

					
				}//Si no tiene los permisos mostramos el mensaje de alerta
				else{
					new MESSAGE($alerta,'../Controllers/CATEGORIAS_Controller.php');


				}
				break;
		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$CATEGORIAS = new CATEGORIAS_Model('','', '', '');
				}
				else{//Recoge los datos
					$CATEGORIAS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $CATEGORIAS->_SHOWALL();
                //Nueva vista
				new CATEGORIA_SHOWALL(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/CATEGORIAS_Controller.php');
			}
	}

?>