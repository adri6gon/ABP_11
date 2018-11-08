<?php

//Clase : USUARIOS_Modelo
class USUARIOS_Model {
	var $login;
    var $password;
	var $rol;
	var $nombre;
    var $apellidos;
	var $mysqli;
	
//Constructor de la clase
function __construct($login,$password,$rol,$nombre,$apellidos){
	$this->login = $login;
	$this->password = $password;
	$this->rol = $rol;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	//var_dump($this);
	//exit();
    if (($this->login <> '')){ // si el atributo clave de la entidad no esta vacio
		
		// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM USUARIO WHERE (login = '$this->login')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `USUARIO`(`login`, `password`, `rol`, `nombre`, `apellidos`) 
				VALUES ('$this->login',
						'$this->password',
						'$this->rol',
						'$this->nombre',
						'$this->apellidos')";
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

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}
//Funcion SHOWALL
function _SHOWALL(){
	$sql = "SELECT `login`, `password`, `rol`, `nombre`, `apellidos` FROM USUARIO";
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
		$sql = "SELECT `login`, `password`, `rol`, `nombre`, `apellidos` FROM USUARIO WHERE(
					(login LIKE '%$this->login%') &&
    				(password LIKE '%$this->password%') &&
    				(rol LIKE '%$this->rol%') &&
    				(nombre LIKE '%$this->nombre%') &&
					(apellidos LIKE '%$this->apellidos%'))";
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
   	$sql = "SELECT * from USUARIO where login = '".$this->login."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'El usuario no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM USUARIO WHERE login = '".$this->login."'";
		if(!$this->mysqli->query($sqlBorrar)){
			return 'Error en el borrado.';
		}
		else{ 
			return 'Borrado realizado con exito.';
			}
	}
}
// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos(){
    $sql = "SELECT `login`, `password`, `rol`, `nombre`, `apellidos` from USUARIO where login = '$this->login'";
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
    $sql = "SELECT * FROM USUARIO WHERE (login = '$this->login')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE USUARIO SET 
					login = '$this->login',
					password = '$this->password',
					rol = '$this->rol',
					nombre = '$this->nombre',
					apellidos = '$this->apellidos'					
				WHERE ( login = '$this->login'
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


// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
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
		return mysqli_fetch_row($resultado);
	}		
}

}//fin Modelo

?> 