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