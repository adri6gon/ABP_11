<?php

//Clase : NOTICIAS_Modelo
class NOTICIAS_Model {
	var $idNoticia;
    var $imageURL;
	var $enlace;
	var $texto;
	var $mysqli;
	
//Constructor de la clase
function __construct($idNoticia,$imageURL,$enlace,$texto){
	$this->idNoticia = $idNoticia;
	$this->imageURL = $imageURL;
	$this->enlace = $enlace;
	$this->texto = $texto;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	$sql = "INSERT INTO `NOTICIA`(`imageURL`, `enlace`, `texto`) 
			VALUES ('$this->imageURL',
					'$this->enlace',
					'$this->texto')";
	if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
			return 'Error en la inserción';
	}
	else{ //si no da error en la insercion devolvemos mensaje de exito
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
	}		
} 

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}
//Funcion SHOWALL
function _SHOWALL(){
	$sql = "SELECT `idNoticia`, `imageURL`, `enlace`, `texto` FROM NOTICIA";
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
		$sql = "SELECT `idNoticia`, `imageURL`, `enlace`, `texto` FROM NOTICIA WHERE(
					(idNoticia LIKE '%$this->idNoticia%') &&
    				(imageURL LIKE '%$this->imageURL%') &&
    				(enlace LIKE '%$this->enlace%') &&
    				(texto LIKE '%$this->texto%'))";
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
   	$sql = "SELECT * from NOTICIA where idNoticia = '".$this->idNoticia."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'El NOTICIA no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM NOTICIA WHERE idNoticia = '".$this->idNoticia."'";
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
    $sql = "SELECT `idNoticia`, `imageURL`, `enlace`, `texto` from NOTICIA where idNoticia = '$this->idNoticia'";
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
    $sql = "SELECT * FROM NOTICIA WHERE (idNoticia = '$this->idNoticia')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE NOTICIA SET 
					idNoticia = '$this->idNoticia',
					imageURL = '$this->imageURL',
					enlace = '$this->enlace',
					texto = '$this->texto'					
				WHERE ( idNoticia = '$this->idNoticia')";
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


// funcion idNoticia: realiza la comprobación de si existe el NOTICIA en la bd y despues si la pass
// es correcta para ese NOTICIA. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function idNoticia(){
	$sql = "SELECT *
			FROM NOTICIA
			WHERE (
				(idNoticia = '$this->idNoticia') 
			)";
	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El idNoticia no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['imageURL'] == $this->imageURL){
			return true;
		}
		else{
			return 'La imageURL para este NOTICIA no es correcta';
		}
	}
}//fin idNoticia
function getMaxID(){
	$sql = "SELECT MAX(idNoticia)
			FROM NOTICIA
			WHERE";
	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El idNoticia no existe';
	}
	else{
		return mysqli_fetch_row($resultado);
	}		
}

}//fin Modelo

?> 