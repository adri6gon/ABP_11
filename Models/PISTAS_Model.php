<?php

//Clase : PISTAS_Modelo
class PISTAS_Model {
	var $idPista;
	var $restriccion;
	var $nombre;
	var $hora;
	var $fecha;
	
//Constructor de la clase
function __construct($idPista, $restriccion, $nombre, $hora, $fecha){
	$this->idPista = $idPista;
	$this->restriccion = $restriccion;
	$this->nombre = $nombre;
	$this->hora = $hora;
	$this->fecha = $fecha;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
		// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM PISTA WHERE (idPista = '$this->idPista')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `PISTA`('idPista', 'restriccion', 'nombre', 'hora', 'fecha') 
				VALUES ('$this->idPista', 
						'$this->restriccion', 
						'$this->nombre', 
						'$this->hora', 
						'$this->fecha')";
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

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}
//Funcion SHOWALL
function _SHOWALL(){
	$sql = "SELECT * FROM PISTA WHERE (fecha = '$this->fecha') ORDER BY hora";
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
function _SHOWNAMES(){
	$sql = "SELECT DISTINCT nombre FROM PISTA";
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

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function _DELETE(){
   	$sql = "SELECT * from PISTA where idPista = '".$this->idPista."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'El PISTA no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM PISTA WHERE idPista = '".$this->idPista."'";
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
    $sql = "SELECT * from PISTA where idPista = '$this->idPista'";
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
    $sql = "SELECT * FROM PISTA WHERE (idPista = '$this->idPista')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE PISTA SET 
					idPista = '$this->idPista', 
					restriccion = '$this->restriccion', 
					nombre = '$this->nombre', 
					hora = '$this->hora', 
					fecha = '$this->fecha'					
				WHERE ( idPista = '$this->idPista'
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
//Funcion para reservar pista(insertar tupla en la tabla intermedia)
function RESERVE($login)
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM PISTA_USUARIO WHERE (idPista = '$this->idPista' & Pistanombre = '$this->nombre')";
	// se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a 0 hacemos la reserva--> Pista libre
    if ($result==null)
    {
		$sqlIns = "INSERT INTO `PISTA_USUARIO`(`PistaidPista`, `Usuariologin`, `Pistanombre`) VALUES ('$this->idPista','$login','$this->nombre')";
		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sqlIns))){
			return 'Error en la reserva'; 
		}
		else{ 
			$sqlUp = "UPDATE PISTA SET 
					restriccion = 1				
				WHERE ( idPista = '$this->idPista'
				)";
			if (!($resul = $this->mysqli->query($sqlUp))){
				return 'Error en la reserva'; 
			}else{
				return 'Reservado correctamente';
			}
		}
		}else{
			return 'Pista ocupada.';
	}
}
function YOUR_RESERVES($login)
{
	 $sql = "SELECT idPista, nombre,fecha,hora FROM PISTA_USUARIO PU, PISTA P WHERE idPista = PistaidPista AND Usuariologin='$login'";
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
function ALL_RESERVES()
{
	$sql = "SELECT idPista, nombre,fecha,hora, PU.Usuariologin FROM PISTA_USUARIO PU, PISTA P WHERE idPista = PistaidPista ";
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
function DEL_RESERVES($login){
	$sql = "SELECT * from PISTA_USUARIO where PistaidPista = '".$this->idPista."' AND Pistanombre='".$this->nombre."' AND Usuariologin ='$login'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'La RESERVA no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM PISTA_USUARIO WHERE PistaidPista = '".$this->idPista."' AND Pistanombre='".$this->nombre."' AND Usuariologin ='$login'";
		if(!$this->mysqli->query($sqlBorrar)){
			return 'Error en el borrado.';
		}
		else{ 
			$sqlRestri = "UPDATE PISTA SET 
							restriccion = 0				
						WHERE ( idPista = '$this->idPista'
						)";
			if($this->mysqli->query($sqlRestri)){
				return 'Reserva borrada con exito.';
			}else{
				return 'Error en la restriccion';
			}
		}
	}
}
}//fin Modelo








?> 