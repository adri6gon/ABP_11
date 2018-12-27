<?php

//Clase : CAMPEONATOS_Modelo
class ESCUELAS_Model {
	var $idEscuela;
    var $nombre;
	var $fundacion;
	
//Constructor de la clase
function __construct($idEscuela,$nombre,$fundacion){
	$this->idEscuela = $idEscuela;
	$this->nombre = $nombre;
	$this->fundacion = $fundacion;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

function RellenaDatos(){
    $sql = "SELECT * from ESCUELA_DEPORTIVA where idEscuela = '$this->idEscuela'";
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
	$sql = "SELECT * FROM ESCUELA_DEPORTIVA";
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
    if (!($this->idEscuela <> '')){ // si el atributo clave de la entidad no esta vacio
		
		// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM ESCUELA_DEPORTIVA WHERE (idEscuela = '$this->idEscuela')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `ESCUELA_DEPORTIVA`(`idEscuela`, `nombre`, `fundacion`) 
				VALUES ('$this->idEscuela',
						'$this->nombre',
						'$this->fundacion')";
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
   	$sql = "SELECT * from ESCUELA_DEPORTIVA where idEscuela = '".$this->idEscuela."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'El campeonato no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM ESCUELA_DEPORTIVA WHERE idEscuela = '".$this->idEscuela."'";
		//var_dump($this->idCampeonato);
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
    $sql = "SELECT * FROM ESCUELA_DEPORTIVA WHERE (idEscuela = '$this->idEscuela')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE ESCUELA_DEPORTIVA SET 
					idEscuela = '$this->idEscuela',
					nombre = '$this->nombre',
					fundacion = '$this->fundacion'				
				WHERE (idEscuela = '$this->idEscuela'
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
		$sql = "SELECT * FROM ESCUELA_DEPORTIVA WHERE(
					(idEscuela LIKE '%$this->idEscuela%') &&
    				(nombre LIKE '%$this->nombre%') &&
    				(fundacion LIKE '%$this->fundacion%'))";
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

function getClases(){
		$sql = "SELECT * FROM CLASES WHERE(
					 idEscuela = '$this->idEscuela')";	
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

/*function inscribirse($idCategoria,$idPareja){
	// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM CATEGORIA_PAREJA WHERE (CategoriaidCampeonato = '$this->idCampeonato' AND ParejaidPareja = '$idPareja' AND 
    			CategoriaidCategoria = '$idCategoria')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `CATEGORIA_PAREJA`(`CategoriaidCategoria`, `CategoriaidCampeonato`, `ParejaIdPareja`)
				VALUES ('$idCategoria',
						'$this->idCampeonato',
						'$idPareja')";
				if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
					return 'Error en la inserción';
				}
				else{ //si no da error en la insercion devolvemos mensaje de exito
					return 'Inscripción realizada con éxito'; //operacion de insertado correcta
				}
				
			}
			else // si ya existe ese valor de clave en la tabla devolvemos el mensaje correspondiente
				return 'Ya esta inscrito'; // ya existe
		}
}*/


}


?>