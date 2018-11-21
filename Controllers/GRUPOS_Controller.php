<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../Functions/Authentication.php';

if (!IsAuthenticated()){
	header('Location:../index.php');
} 

//MODELO GRUPO
include_once '../Models/GRUPOS_Model.php';
//VISTAS GRUPO
include '../Views/GRUPO_SHOWALL_View.php';
include '../Views/GRUPO_SEARCH_View.php';
include '../Views/GRUPO_SHOWCURRENT_View.php';
include '../Views/MESSAGE_View.php';
include '../Functions/ACL.php';

function get_data_form(){

	$idgrupo = $_REQUEST['idGrupo'];
	$nombre = $_REQUEST['nombre'];
	$idcategoria = $_REQUEST['idCategoria'];
	$idcampeonato = $_REQUEST['idCampeonato'];
	
	$action = $_REQUEST['action'];
	
	$GRUPOS = new GRUPOS_Model(
		$idgrupo, 
		$nombre, 
		$idcategoria,
		$idcampeonato
	);

	return $GRUPOS;
}

$lista = array('idGrupo', 'nombre','idCategoria', 'idCampeonato');
$lista2 = array('idCampeonato', 'nombre');
$lista3 = array('idCategoria', 'nivel','genero');
$listapa = array('idPareja','login1','login2');

$funcionalidad = "GRUPOS";
$alerta = "No tiene permisos para esta acción.";

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

Switch ($_REQUEST['action']){
		case 'SEARCH':
        //Si tiene permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$grupo = new GRUPOS_Model('','','','');
					$datos = $grupo->RellenaDatosCampeonato();
					$datos2 = $grupo->RellenaDatosCategoria();
                    //Nueva vista search
					new SEARCH_GRUPO($datos,$datos2,$lista2,$lista3,'../Controllers/GRUPOS_Controller.php');
				}
				else{
                    //Recoge los datos del data form
					$GRUPOS = get_data_form();
					//exit();
                    //Si tiene grupo
						$datos = $GRUPOS->SEARCH();
						//var_dump($datos);
                    //Nueva vista showall
					new GRUPO_SHOWALL(true,$lista, $datos, '../Controllers/GRUPOS_Controller.php?action=SEARCH');
				}
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/GRUPOS_Controller.php');
			}
			break;
		case 'SHOWCURRENT':
        //Si tiene permisos 
			if(comprobarRol('deportista')){
                //nuevo modelo de usuarios
				$GRUPOS = new GRUPOS_Model($_REQUEST['idGrupo'], '', '', '');
                //Recoge los datos de usuarios
				$valores = $GRUPOS->RellenaDatos();
				$valores2 = $GRUPOS->RellenaParejas();
                //Nueva vista
                //var_dump($valores2);
                //var_dump($listapa);
				new GRUPO_SHOWCURRENT($valores,$valores2,'../Controllers/GRUPOS_Controller.php',$lista,$listapa);
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/GRUPOS_Controller.php');
			}
				break;
		case 'GENERAR':
				if(comprobarRol('admin')){
                    	//Recoge los datos con getdataform
						$GRUPOS = new GRUPOS_Model($_REQUEST['idGrupo'], '', $_REQUEST['idCategoria'], $_REQUEST['idCampeonato']);
                    	//LLamas al add del modelo
						$respuesta = $GRUPOS->GEN_ENFRENTAMIENTO();				
						include_once '../Functions/Authentication.php';
						if(!IsAuthenticated()){//Si no esta autenticado
							new MESSAGE($respuesta,'../Controllers/Login_Controller.php');
						}else{//Si esta autenticado
							new MESSAGE($respuesta,'../Controllers/GRUPOS_Controller.php');
						}
					
				}//Si no tiene los permisos mostramos el mensaje de alerta
				else{
					new MESSAGE($alerta,'../Controllers/GRUPOS_Controller.php');
				}
				break;

		default: //Default entra el showall
        //Si no teine permisos
			if(comprobarRol('deportista')){
				if (!$_POST){//Si viene vacio
                    //Nuevo modelo vacio
					$GRUPOS = new GRUPOS_Model('','', '', '');
				}
				else{//Recoge los datos
					$GRUPOS = get_data_form();
				}
				//var_dump($USUARIOS);
				//exit();
                //Llama al showall del modelo
				$datos = $GRUPOS->_SHOWALL();
                //Nueva vista
				new GRUPO_SHOWALL(false,$lista, $datos, '../index.php');
			}else{//Si no tiene permisos
				new MESSAGE($alerta,'../Controllers/GRUPOS_Controller.php');
			}
	}

?>