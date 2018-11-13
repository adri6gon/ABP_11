<?php

//Clase : USUARIOS_Modelo
class PAREJA_Model {
	var $idpareja;
    var $login1;
	var $login2;
	var $mysqli;
	
//Constructor de la clase
function __construct($idpareja,$login1,$login2){
	$this->idpareja = $idpareja;
	$this->login1 = $login1;
	$this->login2 = $login2;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si existe ya en la tabla
function ADD()
{
	//var_dump($this);
	//exit();
    if (($this->idpareja <> '')){ // si el atributo clave de la entidad no esta vacio
		
		// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM PAREJA WHERE (idpareja = '$this->idpareja')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `PAREJA`(`idpareja`, `login1`, `login2`) 
				VALUES ('$this->idpareja',
						'$this->login1',
						'$this->login2')";
				if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
					return 'Error en la inserción de la pareja';
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

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//Funcion SHOWALL
function _SHOWALL(){
	$sql = "SELECT `idpareja`, `login1`, `login2`FROM PAREJA";
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

function _SHOWALLUSER($sesion){
	$this->$sesion = $sesion;
	$sql = "SELECT `idpareja`, `login1`, `login2` FROM PAREJA WHERE login1 = '$sesion' OR login2 = '$sesion' ";
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

//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH(){
	if(!empty($this)){
		$sql = "SELECT `idpareja`, `login1`, `login2`FROM PAREJA WHERE(
					(idpareja LIKE '%$this->idpareja%') &&
    				(login1 LIKE '%$this->login1%') &&
    				(login2 LIKE '%$this->login2%'))";
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


//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function _DELETE(){
   	$sql = "SELECT * from PAREJA where idpareja = '".$this->idpareja."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'La pareja no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM PAREJA WHERE idpareja = '".$this->idpareja."'";
		if(!$this->mysqli->query($sqlBorrar)){
			return 'Error en el borrado de la pareja.';
		}
		else{ 
			return 'Pareja eliminada con éxito.';
			}
	}
}
// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos(){
    $sql = "SELECT `idpareja`, `login1`, `login2`  FROM PAREJA WHERE idpareja = '$this->idpareja'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$tupla = mysqli_fetch_assoc($result);		  
		return $tupla;
	}
	else{
		return  false;
	}
}

// funcion EDIT()
// Se comprueba que la tupla a modificar exista en base al valor de su clave primaria
// si existe se modifica
function EDIT()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM PAREJA WHERE (idpareja= '$this->idpareja')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE PAREJA SET 
					idpareja = '$this->idpareja',
					login1 = '$this->login1',
					login2 = '$this->login2',				
				WHERE ( idpareja = '$this->idpareja'
				)";
		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación de la pareja.'; 
		}
		else{ 
			return 'Pareja modificada correctamente.';
			
		}
    }
    else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	return 'No existe la pareja en la base de datos';
} // fin del metodo EDIT

}
