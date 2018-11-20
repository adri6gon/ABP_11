<?php

//Clase : GRUPOS_Modelo
class GRUPOS_Model {
	var $idGrupo;
    var $nombre;
	var $idCategoria;
	var $idCampeonato;
	
//Constructor de la clase
function __construct($idGrupo,$nombre,$idCategoria,$idCampeonato){
	$this->idGrupo = $idGrupo;
	$this->nombre = $nombre;
	$this->idCategoria = $idCategoria;
	$this->idCampeonato = $idCampeonato;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

function RellenaDatos(){
    $sql = "SELECT `idGrupo`, `nombre`, `idCategoria`, `idCampeonato` from GRUPO where idGrupo = '$this->idGrupo'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$tupla = mysqli_fetch_assoc($result);		  
		return $tupla;
	}
	else{
		return  false;
	}
}

function RellenaDatosCampeonato(){
    $sql = "SELECT `idCampeonato`, `nombre` FROM CAMPEONATO";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$j = 0;
		while($tupla = mysqli_fetch_assoc($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}
	else{
		return  false;
	}
}

function RellenaDatosCategoria(){
    $sql = "SELECT `idCategoria`, `nivel`, `genero` FROM CATEGORIA";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$j = 0;
		while($tupla = mysqli_fetch_assoc($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}
	else{
		return  false;
	}
}

function RellenaParejas(){
    $sql = "SELECT `idPareja`, `login1`, `login2` FROM PAREJA, GRUPO_PAREJA WHERE idPareja = ParejaidPareja AND GrupoidGrupo = '$this->idGrupo'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$j = 0;
		while($tupla = mysqli_fetch_assoc($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}
	else{
		return  false;
	}
}

function _SHOWALL(){
	$sql = "SELECT `idGrupo`, `nombre`, `idCategoria`, `idCampeonato` FROM GRUPO";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$j = 0;
		while($tupla = mysqli_fetch_assoc($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}
	else{
		return  false;
	}
} 

function SEARCH(){
	if(!empty($this)){
		$sql = "SELECT `idGrupo`, `nombre`, `idCategoria`, `idCampeonato` FROM GRUPO WHERE(
					(idGrupo LIKE '%$this->idGrupo%') &&
    				(nombre LIKE '%$this->nombre%') &&
    				(idCategoria LIKE '%$this->idCategoria%') &&
    				(idCampeonato LIKE '%$this->idCampeonato%'))";
	}	
    	$result = $this->mysqli->query($sql);  
  // var_dump($result);
		//exit();
	if($result->num_rows>0){
		//
		$j = 0;
		while($tupla = mysqli_fetch_assoc($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}else{
		return false;
	}
}

function genEnf($ParejaActual, $numParejas, $ArrayParejas){

	for($i = $ParejaActual+1; $i < $numParejas; $i++){
		$this->emparejar($ParejaActual, $i, $ArrayParejas);
	} 
	if($ParejaActual == $numParejas-1){
		return true;
	}else{
		$this->genEnf($ParejaActual+1,$numParejas,$ArrayParejas);
		
	}

}

function emparejar($ParejaActual, $Rival, $ArrayParejas){

	$par1 = $ArrayParejas[$ParejaActual];
	$par2 = $ArrayParejas[$Rival];

	$sqlcomp = "SELECT * FROM ENFRENTAMIENTO WHERE (idGrupo = '$this->idGrupo' AND idPareja1 = '$par1' AND idPareja2 = '$par2') ";

	if (!$resultcomp = $this->mysqli->query($sqlcomp)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}else{
			if(!$resultcomp->num_rows>0){


				$sql = "INSERT INTO `ENFRENTAMIENTO`(`idGrupo`, `idPareja1`, `idPareja2`, `GrupoidCategoria`, `GrupoidCampeonato`) 
					VALUES ('$this->idGrupo',
						'$par1',
						'$par2',
						'$this->idCategoria',
						'$this->idCampeonato')";

					if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
						return 'Error en la inserción';
					}
					else{ //si no da error en la insercion devolvemos mensaje de exito
						return 'Inserción realizada con éxito'; //operacion de insertado correcta
					}
				}else{
					return 'Enfrentamiento ya insertado';
				}
			}

}

function GEN_ENFRENTAMIENTO(){

	 if (($this->idGrupo <> '')){ // si el atributo clave de la entidad no esta vacio

 			$sql = "SELECT ParejaidPareja FROM GRUPO_PAREJA WHERE (GrupoidGrupo = '$this->idGrupo')";

 			if (!$result = $this->mysqli->query($sql)){

 				return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara

 			}else{
 				if($result->num_rows>0){
 					
 					$aux=0;
 					while ($fila = mysqli_fetch_row($result)) {
						$parejas[$aux] = $fila[0];
						$aux++;
					}

							$this->genEnf(0,count($parejas),$parejas);

							return 'Se han generado los enfrentamientos del grupo.';

				}else{
					return 'No se han asignado parejas al grupo todavía.'; // introduzca un valor para la categoria
				}


 			}

 	}else{
		return 'Introduzca una grupo'; // introduzca un valor para la categoria
	}
}


function login(){
	$sql = "SELECT *
			FROM USUARIO
			WHERE (
				(login = '$this->login') 
			)";
	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
}//fin login
function comprobarAdmin(){
	$sql = "SELECT rol FROM USUARIO WHERE rol='admin' AND login = '$this->login'";
	$resultado = $this->mysqli->query($sql);
	$j = 0;
	while($tupla = mysqli_fetch_row($result)){
			$tuplas[$j] = $tupla[0];
			$j++;
	}
	if($tuplas == null){
		return false;
	}
	else{
		return $tuplas;
	}
}
function getRol(){
	$sql = "SELECT rol
			FROM USUARIO
			WHERE (
				(login = '$this->login') 
			)";
	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		return $resultado;
	}		
}

}


?>