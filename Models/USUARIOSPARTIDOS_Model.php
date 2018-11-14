<?php

//Clase : USUARIOS_Modelo
class USUARIOSPARTIDOS_Model {
	var $login;
    var $idPartido;
	
//Constructor de la clase
function __construct($login,$idPartido){
	$this->login = $login;
	$this->idPartido = $idPartido;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

function _INSCRIBIRSE(){
    $sql= "INSERT INTO USUARIO_PARTIDO VALUES ('$this->login', '$this->idPartido')";
	if (!$this->mysqli->query($sql)){
		return 'Error en la inscripción';
    } else{
        return 'Se ha inscrito correctamente en el partido';
    }

}


function _DESINSCRIBIRSE(){
	$sql = "DELETE FROM USUARIO_PARTIDO WHERE login = '$this->login' AND idPartido = '$this->idPartido'";
	if (!$this->mysqli->query($sql)){
		return 'Error en la desinscripción';
    } else{
        return 'Se ha desinscrito correctamente en el partido';
    }

}

}
