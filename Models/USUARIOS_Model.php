<!--
Funcion del archivo: Archivo que contiene la clase de Modelo de datos con todas las funciones necesarias de ADD,SEARCH,EDIT,etc...
Autor: bl4vix
Fecha: 12/11/17
-->
<?php

//Clase : USUARIOS_Modelo
class USUARIOS_Model {

	var $login;
    var $password;
	var $DNI;
	var $nombre;
    var $apellidos;
	var $email;
	var $direccion;
	var $telefono;
	var $mysqli;
	
//Constructor de la clase
function __construct($login,$password,$DNI,$email,$nombre,$apellidos,$telefono,$direccion){
	$this->login = $login;
	$this->password = $password;
	$this->DNI = $DNI;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->email = $email;
	$this->direccion = $direccion;
	$this->telefono = $telefono;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}
/*function subidaFoto(){
	$nombrearchivo = $this->login.'-'.$_FILES["fotopersonal"]["name"];
	$FileType = pathinfo($_FILES["fotopersonal"]["name"],PATHINFO_EXTENSION);
	$directorio = '../Files'."/";
	$ruta = $directorio.basename($nombrearchivo);
	//Comprobacion de tipo de archivo
		if($FileType != "png" && $FileType != "jpg" && $FileType != "gif" && $FileType != "") {
			return "Solamente se pueden subir archivos con extension png, jpg o gif.";
			return false;
		}else {//Comprobacion del tamaño
			if ($_FILES["fotopersonal"]['size'] > 5000000) {
				return "Tu archivo pesa demasiado.";
				return false;
			}else{
				if(move_uploaded_file($_FILES['fotopersonal']['tmp_name'],$ruta)){
					return "Foto subida correctamente.";
				}
				else{
					return false;
				}
			}
		}
}*/
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
				$sql = "INSERT INTO `USUARIO`(`login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`) 
				VALUES ('$this->login',
						'$this->password',
						'$this->DNI',
						'$this->nombre',
						'$this->apellidos',
						'$this->email',
						'$this->direccion',
						'$this->telefono')";
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
	$sql = "SELECT `login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono` FROM USUARIO";
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
function SEARCH($idGrupo){
	if(!empty($this) && $idGrupo==null){
		$sql = "SELECT `login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono` FROM USUARIO WHERE(
					(login LIKE '%$this->login%') &&
    				(password LIKE '%$this->password%') &&
    				(DNI LIKE '%$this->DNI%') &&
    				(Nombre LIKE '%$this->nombre%') &&
					(Apellidos LIKE '%$this->apellidos%') &&
					(Correo LIKE '%$this->email%') &&
					(Direccion LIKE '%$this->direccion%')&&
					(Telefono LIKE '%$this->telefono%'))";
	}else{
		if($idGrupo!=null && empty($this)){
			$sql = "SELECT * FROM USUARIO WHERE USUARIO.login = (SELECT login FROM USU_GRUPO WHERE idGrupo='$idGrupo')";
		}else{
			if($idGrupo==null && empty($this)){
				$sql = "SELECT * FROM USUARIO";
			}else{
				//Que no este vacio el usuario ni el grupo
				$sql = "SELECT U.* FROM `USUARIO` U, `USU_GRUPO` UG WHERE U.login = UG.login && UG.idGrupo = '$idGrupo' && (U.login LIKE '%$this->login%') &&
    				(U.password LIKE '%$this->password%') &&
    				(U.DNI LIKE '%$this->DNI%') &&
    				(U.Nombre LIKE '%$this->nombre%') &&
					(U.Apellidos LIKE '%$this->apellidos%') &&
					(U.Correo LIKE '%$this->email%') &&
					(U.Direccion LIKE '%$this->direccion%')&&
					(U.Telefono LIKE '%$this->telefono%')";
			}
		}
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
			if($this->deletegrupos()){
				return 'Borrado realizado con exito.';
			}
			else{
				return 'Error no borrado en USU_GRUPO';
			}
			}
	}
}
//Funcion que borra una imagen del servidor
/*function DEL_IMG(){
	$sql = "SELECT fotopersonal FROM USUARIO WHERE login = '".$this->login."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return " Error en el borrado de la imagen.";
	}else{
		$tupla = mysqli_fetch_assoc($result);
		unlink($tupla['fotopersonal']);
		return " Imagen borrada correctamente del servidor.";
	}
}*/

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos(){
    $sql = "SELECT `login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono` from USUARIO where login = '$this->login'";
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
					DNI = '$this->DNI',
					Nombre = '$this->nombre',
					Apellidos = '$this->apellidos',
					Correo = '$this->email',
					Direccion = '$this->direccion',
					Telefono = '$this->telefono'
					
				WHERE ( login = '$this->login'
				)";
		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la modificación'; 
		}
		else{ 
			return 'Modificado correctamente.';
		
		// si no hay problemas con la modificación se indica que se ha modificado
				//Si el usuario no ha subido una foto no se modifica 
			/*if($this->fotopersonal=="../Files/".$this->login."-"){
					return 'Modificado correctamente';
		    }	
			else{//Si la subio llamamos a la funcion de subida al servidor y modificamos el valor de la foto en la BD
				if($this->subidaFoto()){
					$sql2 = "UPDATE USUARIO SET fotopersonal = '$this->fotopersonal' WHERE ( login = '$this->login')";
					$resultado2 = $this->mysqli->query($sql2);
					return $resultado2;
				}else{
					return "Foto no subida.";
				}
			}*/
			
			
		}
    }
    else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	return 'No existe en la base de datos';
} // fin del metodo EDIT

function deletegrupos(){
	$sql = "DELETE FROM `USU_GRUPO` WHERE (login = '$this->login')";
		if(!$this->mysqli->query($sql)){
			return false;
		}
		else{
			return true;
			}
}


//Funcion de asignar un grupo a un USUARIO
function asigGrupo($IdGrupo){
	$sql = "SELECT *
			FROM USU_GRUPO
			WHERE (
				(login = '$this->login') 
			)"; 
	
	$resultado = $this->mysqli->query($sql);
	$band = true;
	while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		if ($row['IdGrupo'] == $IdGrupo){
			return "Ya esta asignado a ese grupo";
			$band = false;
		}	
	} //Si $band==true entonces no tiene ese grupo asignado
	if($band){
		$sqlInser = "INSERT INTO USU_GRUPO(login, IdGrupo) VALUES ('$this->login','$IdGrupo')";	
	
		if (!$this->mysqli->query($sqlInser)) { // si da error en la ejecución del insert devolvemos mensaje
				return 'Error en la inserción';
		}
		else{ //si no da error en la insercion devolvemos mensaje de exito
			return 'Asignacion realizada con éxito'; //operacion de insertado correcta
		}
	}
}
//Funcion que devuelve los grupos a los que esta asignado un usuario
function gruposAsig(){
	$sql = "SELECT IdGrupo from USU_GRUPO where login = '$this->login'";
	$result = $this->mysqli->query($sql);  
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
//Funcion que devuelve todos los grupos en los que se puede meter un USUARIO
function grupos(){
	$sql = "SELECT IdGrupo, NombreGrupo from GRUPO";
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
	$sql = "SELECT G.NombreGrupo FROM GRUPO G, USU_GRUPO UG WHERE UG.IdGrupo = G.IdGrupo && UG.login = '$this->login'";
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
function getPermisos(){
	$sql ="SELECT DISTINCT A.NombreAccion, F.NombreFuncionalidad FROM USU_GRUPO UG, PERMISO P, FUNCIONALIDAD F, ACCION A  WHERE UG.login='$this->login' && UG.IdGrupo= P.IdGrupo && P.IdFuncionalidad=F.IdFuncionalidad && P.IdAccion = A.IdAccion";
	$result = $this->mysqli->query($sql);  
	$j = 0;
	while($tupla = mysqli_fetch_row($result)){
			$tuplas[$j] = $tupla;
			$j++;
	}
	if($tuplas == null){
		return false;
	}
	else{
		return $tuplas;
	}
}

}//fin Modelo

?> 