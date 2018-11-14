<?php

//Clase : CATEGORIAS_Modelo
class CATEGORIAS_Model {
	var $idCategoria;
    var $genero;
	var $nivel;
	var $idCampeonato;
	
//Constructor de la clase
function __construct($idCategoria,$genero,$nivel,$idCampeonato){
	$this->idCategoria = $idCategoria;
	$this->genero = $genero;
	$this->nivel = $nivel;
	$this->idCampeonato = $idCampeonato;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

function RellenaDatos(){
    $sql = "SELECT `idCategoria`, `genero`, `nivel`, `idCampeonato` from CATEGORIA where idCategoria = '$this->idCategoria'";
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

function _SHOWALL(){
	$sql = "SELECT `idCategoria`, `genero`, `nivel`, `idCampeonato` FROM CATEGORIA";
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
    if (!($this->idCategoria <> '')){ // si el atributo clave de la entidad no esta vacio
		
		// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM CATEGORIA WHERE (idCategoria = '$this->idCategoria')";
        //$sql2 = "SELECT * FROM CAMPEONATO WHERE (idCampeonato = '$this->idCampeonato')";

		if (!$result = $this->mysqli->query($sql) /*AND $result2 = $this->mysqli->query($sql2)*/){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0 /*AND $result2->num_rows == 0*/){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `CATEGORIA`(`idCategoria`, `genero`, `nivel`, `idCampeonato`) 
				VALUES ('$this->idCategoria',
						'$this->genero',
						'$this->nivel',
						'$this->idCampeonato')";
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
   	$sql = "SELECT * from CATEGORIA where idCategoria = '".$this->idCategoria."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'La Categoria no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM CATEGORIA WHERE idCategoria = '".$this->idCategoria."'";
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
    $sql = "SELECT * FROM CATEGORIA WHERE idCategoria = '".$this->idCategoria."'";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE CATEGORIA SET 
					idCategoria = '$this->idCategoria',
					genero = '$this->genero',
					nivel = '$this->nivel',
					idCampeonato = '$this->idCampeonato'					
				WHERE ( idCategoria = '$this->idCategoria'
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
		$sql = "SELECT `idCategoria`, `genero`, `nivel`, `idCampeonato` FROM CATEGORIA WHERE(
					(idCategoria LIKE '%$this->idCategoria%') &&
    				(genero LIKE '%$this->genero%') &&
    				(nivel LIKE '%$this->nivel%') &&
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

function GENERATE_GROUPS(){
   //	$sql = "SELECT * from CATEGORIA where idCategoria = '".$this->idCategoria."'";
	//$result = $this->mysqli->query($sql);
	//if ($result->num_rows == 0){
		return 'Los grupos de la categoria han sido generados correctamente.';
	//}
	//else{
	//	$sqlBorrar = "DELETE FROM CATEGORIA WHERE idCategoria = '".$this->idCategoria."'";
	//	if(!$this->mysqli->query($sqlBorrar)){
	//		return 'Error en el borrado.';
	//	}
	//	else{ 
	//		return 'Borrado realizado con exito.';
	//		}
	//}
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