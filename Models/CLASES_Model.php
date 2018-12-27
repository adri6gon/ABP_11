<?php

//Clase : CATEGORIAS_Modelo
class CLASES_Model {
	var $idEscuela;
    var $idClase;
	var $fecha;
    var $hora;
    var $capacidadAlumnos;
    var $idPista;
    var $Pistanombre;
    var $entrenador;
	
//Constructor de la clase
function __construct($idEscuela, $idClase, $fecha,$hora, $capacidadAlumnos, $idPista,$Pistanombre,$entrenador){
    $this->idEscuela = $idEscuela;
    $this->idClase = $idClase;
    $this->fecha = $fecha;
    $this->hora = $hora;
    $this->capacidadAlumnos = $capacidadAlumnos;
    $this->idPista = $idPista;
    $this->Pistanombre = $Pistanombre;
    $this->entrenador = $entrenador;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

function RellenaDatos(){
    $sql = "SELECT E.nombre , C.fecha, C.hora, C.capacidadAlumnos, C.Pistanombre, C.entrenador,C.idClase, C.idPista FROM CLASES C,ESCUELA_DEPORTIVA E WHERE C.idEscuela = E.idEscuela && C.idClase='$this->idClase'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$tupla = mysqli_fetch_assoc($result);		  
		return $tupla;
	}
	else{
		return  false;
	}
}
function rellenaDatosTotal(){
	$sql = "SELECT * FROM CLASES WHERE idClase='$this->idClase'";
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
	$sql = "SELECT E.nombre , C.fecha, C.hora, C.capacidadAlumnos, C.Pistanombre, C.entrenador, C.idClase FROM CLASES C,ESCUELA_DEPORTIVA E WHERE C.idEscuela = E.idEscuela";
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
		// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT * FROM CLASES WHERE (idClase = '$this->idClase')";
        //$sql2 = "SELECT * FROM CAMPEONATO WHERE (idCampeonato = '$this->idCampeonato')";

		if (!$result = $this->mysqli->query($sql) /*AND $result2 = $this->mysqli->query($sql2)*/){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0 /*AND $result2->num_rows == 0*/){ // miramos si el resultado de la consulta es vacio (no existe el login)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `CLASES`(idEscuela, fecha,hora,capacidadAlumnos,idPista,Pistanombre, entrenador) 
				VALUES ('$this->idEscuela',
						'$this->fecha',
						'$this->hora',
						'$this->capacidadAlumnos',
						'$this->idPista',
						'$this->Pistanombre',
						'$this->entrenador')";
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

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function _DELETE(){
   	$sql = "SELECT * from CLASES where idClase = '".$this->idClase."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'La Categoria no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM CLASES WHERE idClase = '".$this->idClase."'";
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
    $sql = "SELECT * FROM CLASES WHERE idClase = '".$this->idClase."'";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
	{	// se construye la sentencia de modificacion en base a los atributos de la clase
		//var_dump($this);
		//exit();
		$sql = "UPDATE CLASES SET 
					idEscuela = '$this->idEscuela',
					fecha = '$this->fecha',
					hora = '$this->hora',
					capacidadAlumnos = '$this->capacidadAlumnos',
					idPista = '$this->idPista',
					entrenador = '$this->entrenador'	
				WHERE ( idClase = '$this->idClase')";
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
		$sql = "SELECT  `idEscuela`, `idClase`, `fecha`, `hora`, `capacidadAlumnos`, `idPista`, `Pistanombre`, `entrenador` FROM CLASES WHERE(
					(idEscuela LIKE '%$this->idEscuela%') &&
					(idClase LIKE '%$this->idClase%') &&
    				(fecha LIKE '%$this->fecha%') &&
    				(hora LIKE '%$this->hora%')&&
					(capacidadAlumnos LIKE '%$this->capacidadAlumnos%')&&
					(idPista LIKE '%$this->idPista%')&&
					(Pistanombre LIKE '%$this->Pistanombre%')&&
					(entrenador LIKE '%$this->entrenador%'))";
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
function getEscuelas(){
	$sql = "SELECT idEscuela, nombre FROM ESCUELA_DEPORTIVA";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$j = 0;
		while($tupla = mysqli_fetch_row($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}
	else{
		return  false;
	}
}
function isFull(){
	$sql = "SELECT capacidadAlumnos from CLASES where idClase = '".$this->idClase."'";
	$sql2 = "SELECT COUNT(Usuariologin) FROM `USUARIO_CLASES` WHERE idClase = '".$this->idClase."'";
	$result = $this->mysqli->query($sql);  
	$resultado = $this->mysqli->query($sql2);  
	$primero =  mysqli_fetch_row($result);
	$segundo =  mysqli_fetch_row($resultado);
	if($primero[0] == $segundo[0]){
		return true;
	}else{
		return false;
	}
}
function inscribirse($login){
	$sql = "SELECT * FROM `USUARIO_CLASES` WHERE idClase = ".$this->idClase." && Usuariologin='".$login."'";
	$result =$this->mysqli->query($sql);
	if($result->num_rows==0){
		$sqlIns = "INSERT INTO `USUARIO_CLASES`(`Usuariologin`, `idClase`) VALUES ('$login','$this->idClase')";
		if (!$this->mysqli->query($sqlIns)) { // si da error en la ejecución del insert devolvemos mensaje
			return 'Error en la inscripción';
		}
		else{ //si no da error en la insercion devolvemos mensaje de exito
			return 'Inscripción realizada con éxito'; //operacion de insertado correcta
		}
	}else{
		return "El usuario ya esta inscrito en esta clase";
	}
}

function asistencia($login){
	$sql = "SELECT * FROM `USUARIO_CLASES` WHERE idClase = ".$this->idClase."";
	$result =$this->mysqli->query($sql);
	
}

}


?>