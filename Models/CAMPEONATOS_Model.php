<?php

//Clase : CAMPEONATOS_Modelo
class CAMPEONATOS_Model {
	var $idCampeonato;
    var $nombre;
	var $fechaIniInscripcion;
	var $fechaFinInscripcion;
	
//Constructor de la clase
function __construct($idCampeonato,$nombre,$fechaIniInscripcion,$fechaFinInscripcion){
	$this->idCampeonato = $idCampeonato;
	$this->nombre = $nombre;
	$this->fechaIniInscripcion = $fechaIniInscripcion;
	$this->fechaFinInscripcion = $fechaFinInscripcion;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

function RellenaDatos(){
    $sql = "SELECT `idCampeonato`, `nombre`, `fechaIniInscripcion`, `fechaFinInscripcion` from CAMPEONATO where idCampeonato = '$this->idCampeonato'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$tupla = mysqli_fetch_assoc($result);		  
		return $tupla;
	}
	else{
		return  false;
	}
}

function _SHOWALL(){
	$sql = "SELECT `idCampeonato`, `nombre`, `fechaIniInscripcion`, `fechaFinInscripcion` FROM CAMPEONATO";
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

function ADD(){
	//var_dump($this);
	//exit();
    if (!($this->idCampeonato <> '')){ // si el atributo clave de la entidad no esta vacio
		
		// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM CAMPEONATO WHERE (idCampeonato = '$this->idCampeonato')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `CAMPEONATO`(`idCampeonato`, `nombre`, `fechaIniInscripcion`, `fechaFinInscripcion`) 
				VALUES ('$this->idCampeonato',
						'$this->nombre',
						'$this->fechaIniInscripcion',
						'$this->fechaFinInscripcion')";
				if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
					return 'Error en la inserción';
				}
				else{ //si no da error en la insercion devolvemos mensaje de exito
					return 'Inserción realizada con éxito'; //operacion de insertado correcta
				}
				
			}
			else // si ya existe ese valor de clave en la tabla devolvemos el mensaje correspondiente
				return 'Ya existe en la base de datos'; // ya existe
		}
    }
    else{ // si el atributo clave de la bd es vacio solicitamos un valor en un mensaje
        return 'Introduzca un valor'; // introduzca un valor para el usuario
	}
} 

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function _DELETE(){
   	$sql = "SELECT * from CAMPEONATO where idCampeonato = '".$this->idCampeonato."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'El campeonato no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM CAMPEONATO WHERE idCampeonato = '".$this->idCampeonato."'";
		var_dump($this->idCampeonato);
		if(!$this->mysqli->query($sqlBorrar)){
			return 'Error en el borrado.';
		}
		else{ 
			return 'Borrado realizado con exito.';
			}
	}
}

// funcion EDIT()
// Se comprueba que la tupla a modificar exista en base al valor de su clave primaria
// si existe se modifica
function EDIT()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM CAMPEONATO WHERE (idCampeonato = '$this->idCampeonato')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE CAMPEONATO SET 
					idCampeonato = '$this->idCampeonato',
					nombre = '$this->nombre',
					fechaIniInscripcion = '$this->fechaIniInscripcion',
					fechaFinInscripcion = '$this->fechaFinInscripcion'					
				WHERE ( idCampeonato = '$this->idCampeonato'
				)";
		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación'; 
		}
		else{ 
			return 'Modificado correctamente.';
			
		}
    }
    else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	return 'No existe en la base de datos';
} // fin del metodo EDIT

function SEARCH(){
	if(!empty($this)){
		$sql = "SELECT `idCampeonato`, `nombre`, `fechaIniInscripcion`, `fechaFinInscripcion` FROM CAMPEONATO WHERE(
					(idCampeonato LIKE '%$this->idCampeonato%') &&
    				(nombre LIKE '%$this->nombre%') &&
    				(fechaIniInscripcion LIKE '%$this->fechaIniInscripcion%') &&
    				(fechaFinInscripcion LIKE '%$this->fechaFinInscripcion%'))";
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