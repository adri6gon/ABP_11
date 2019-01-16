<?php

//Clase : ENFRENTAMIENTOS_Modelo
class ENFRENTAMIENTOS_Model {
	var $idEnfrentamiento;
	var $idGrupo; 
	var $idPareja1;
	var $idPareja2; 
	var $GrupoIdCategoria;
	var $GrupoIdCampeonato;
	var $set1;
	var $set2;
	var $set3;
	var $mysqli;
	
//Constructor de la clase
function __construct($idEnfrentamiento,$idGrupo,$idPareja1,$idPareja2,$GrupoIdCategoria,$GrupoIdCampeonato,$set1,$set2,$set3){
	$this->idEnfrentamiento = $idEnfrentamiento;
	$this->idGrupo = $idGrupo;
	$this->idPareja1 = $idPareja1;
	$this->idPareja2 = $idPareja2;
	$this->GrupoIdCategoria = $GrupoIdCategoria;
	$this->GrupoIdCampeonato = $GrupoIdCampeonato;
	$this->set1 = $set1;
	$this->set2 = $set2;
	$this->set3 = $set3;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
        $sql = "SELECT * FROM ENFRENTAMIENTO WHERE (idEnfrentamiento = '$this->idEnfrentamiento')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el contidPareja1ador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el idEnfrentamiento)
				//construimos la sentencia sql de inserción en la bd
				$sql = "INSERT INTO `ENFRENTAMIENTO`(`idEnfrentamiento`, `idGrupo`, `idPareja1`, `idPareja2`, `GrupoIdCategoria`,`GrupoIdCampeonato`) 
				VALUES ('',
						'$this->idGrupo',
						'$this->idPareja1',
						'$this->idPareja2',
						'$this->GrupoIdCategoria',
						'$this->GrupoIdCampeonato')";
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
	$sql = "SELECT * FROM ENFRENTAMIENTO";
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

function getIdCampeonato(){
	$sql = "SELECT idCampeonato FROM GRUPO WHERE idCampeonato='$this->GrupoIdCampeonato'";
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
		$sql = "SELECT * FROM ENFRENTAMIENTO WHERE(
					(idEnfrentamiento LIKE '%$this->idEnfrentamiento%') &&
    				(idGrupo LIKE '%$this->idGrupo%') &&
    				(idPareja1 LIKE '%$this->idPareja1%') &&
    				(idPareja2 LIKE '%$this->idPareja2%') &&
					(GrupoIdCategoria LIKE '%$this->GrupoIdCategoria%')&&
					(GrupoIdCampeonato LIKE '%$this->GrupoIdCampeonato%'))";
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
   	$sql = "SELECT * from ENFRENTAMIENTO where idEnfrentamiento = '".$this->idEnfrentamiento."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows == 0){
		return 'El ENFRENTAMIENTO no existe, no se puede borrar.';
	}
	else{
		$sqlBorrar = "DELETE FROM ENFRENTAMIENTO WHERE idEnfrentamiento = '".$this->idEnfrentamiento."'";
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
    $sql = "SELECT * from ENFRENTAMIENTO where idEnfrentamiento = '$this->idEnfrentamiento'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$tupla = mysqli_fetch_assoc($result);		  
		return $tupla;
	}
	else{
		return  false;
	}
}

function RellenaDatosPlayoff(){
    $sql = "SELECT * from ENFRENTAMIENTO_RONDA where idEnfrentamientoRonda = '$this->idEnfrentamiento'";
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
function RESULTADO()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM ENFRENTAMIENTO WHERE (idEnfrentamiento = '$this->idEnfrentamiento')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE `ENFRENTAMIENTO` SET `set1`='$this->set1',`set2`='$this->set2',`set3`='$this->set3' WHERE `idEnfrentamiento`='$this->idEnfrentamiento'";
		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la inserción'; 
		}
		else{ 
			return 'Insertado correctamente.';
			
		}
    }
    else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	return 'No existe en la base de datos';
}

function RESULTADO_PLAYOFF()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * from ENFRENTAMIENTO_RONDA where idEnfrentamientoRonda = '$this->idEnfrentamiento'";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    if ($result->num_rows == 1)
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
		$sql = "UPDATE `ENFRENTAMIENTO_RONDA` SET `set1`='$this->set1',`set2`='$this->set2',`set3`='$this->set3' WHERE `idEnfrentamientoRonda`='$this->idEnfrentamiento'";
		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sql))){
			return 'Error en la inserción'; 
		}
		else{ 
			return 'Insertado correctamente.';
			
		}
    }
    else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	return 'No existe en la base de datos';
}

function getResultados(){
	// se construye la sentencia de busqueda de la tupla en la bd
	/** SELECT g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c, GRUPO g 
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND GrupoidCategoria = cat.idCategoria AND GrupoidCampeonato = c.idCampeonato AND e.idGrupo=g.idGrupo AND e.idGrupo='$this->idGrupo' AND p1.login1 != p2.login1 AND  p1.login1 != p2.login2 AND p1.login2 != p2.login1 AND p1.login2 != p2.login2 AND e.GrupoidCampeonato='$this->GrupoIdCampeonato') */
    $sql = "SELECT g.idGrupo,e.idEnfrentamiento, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c, GRUPO g 
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND GrupoidCategoria = cat.idCategoria AND GrupoidCampeonato = c.idCampeonato AND e.idGrupo=g.idGrupo AND e.idGrupo='$this->idGrupo' AND e.GrupoidCampeonato='$this->GrupoIdCampeonato')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
	// var_dump($result);
		  //exit();
	  if($result->num_rows>0){
		  //
		  $j = 0;
		  while($tupla = mysqli_fetch_array($result)){
			 $tuplas[$j] = $tupla;
			 $j++;		
		  }
		  return $tuplas;
	  }else{
		  return false;
	  }
}
function getResultadosGrupo(){
	// se construye la sentencia de busqueda de la tupla en la bd
	/** SELECT g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c, GRUPO g 
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND g.idGrupo = '$this->idGrupo' AND GrupoidCampeonato = c.idCampeonato AND e.idGrupo=g.idGrupo AND p1.login1 != p2.login1 AND  p1.login1 != p2.login2 AND p1.login2 != p2.login1 AND p1.login2 != p2.login2 AND e.GrupoidCampeonato='$this->GrupoIdCampeonato')*/
    $sql = "SELECT g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c, GRUPO g 
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND g.idGrupo = '$this->idGrupo' AND GrupoidCampeonato = c.idCampeonato AND e.idGrupo=g.idGrupo AND cat.idCategoria = e.GrupoidCategoria)";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
	// var_dump($result);
		  //exit();
	  if($result->num_rows>0){
		  //
		  $j = 0;
		  while($tupla = mysqli_fetch_array($result)){
			 $tuplas[$j] = $tupla;
			 $j++;		
		  }
		  return $tuplas;
	  }else{
		  return false;
	  }
}
function getParejas()
{
	$sql = "SELECT `idPareja`, `login1`, `login2` FROM PAREJA p, GRUPO_PAREJA gp WHERE gp.GrupoidGrupo ='$this->idGrupo' AND gp.ParejaidPareja = p.idPareja AND gp.GrupoidCampeonato = '$this->GrupoIdCampeonato'";
	 // se ejecuta la query
	 $result = $this->mysqli->query($sql);
	 // var_dump($result);
		   //exit();
	   if($result->num_rows>0){
		   //
		   $j = 0;
		   while($tupla = mysqli_fetch_array($result)){
			  $tuplas[$j] = $tupla;
			  $j++;		
		   }
		   return $tuplas;
	   }else{
		   return false;
	   }
}
function getMisEnfrentamientos($login){
		$sql = "SELECT DISTINCT(E.idEnfrentamiento),P.login1, P.login2,P2.login1 as P2login1,P2.login2 as P2login2, C.genero,C.nivel, G.nombre, E.set1, E.set2,E.set3 FROM ENFRENTAMIENTO E, PAREJA P, GRUPO G, CATEGORIA_PAREJA CP, CATEGORIA C, CAMPEONATO CA, PAREJA P2 WHERE (E.idPareja1 = P.idPareja || E.idPareja2 = P.idPareja) && (P.login1 = '$login' || P.login2='$login') && C.idCategoria = E.GrupoidCategoria && GrupoidCategoria = CP.CategoriaidCategoria && P2.idPareja = E.idPareja2 && G.idGrupo = E.idGrupo";
		$result = $this->mysqli->query($sql);  
		if($result->num_rows>0){
			$j = 0;
			while($tupla = mysqli_fetch_array($result)){
			   $tuplas[$j] = $tupla;
			   $j++;		
			}
			return $tuplas;
		}else{
			return false;
		}
	
}
function getMisEnfrentamientosRonda($login){
	$sql = "SELECT DISTINCT(E.idEnfrentamientoRonda),P.login1, P.login2,P2.login1 as P2login1,P2.login2 as P2login2, C.genero,C.nivel, E.set1, E.set2,E.set3, E.CategoriaidCategoria as idCategoria, E.CategoriaidCampeonato as idCampeonato FROM ENFRENTAMIENTO_RONDA E, PAREJA P, CATEGORIA_PAREJA CP, CATEGORIA C, CAMPEONATO CA, PAREJA P2 WHERE (E.idPareja1 = P.idPareja || E.idPareja2 = P.idPareja) && (P.login1 = '$login' || P.login2='$login') && C.idCategoria = E.CategoriaidCategoria && C.idCategoria = CP.CategoriaidCategoria && P2.idPareja = E.idPareja2";
	$result = $this->mysqli->query($sql);  
	if($result->num_rows>0){
		$j = 0;
		while($tupla = mysqli_fetch_array($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}else{
		return false;
	}

}
function getHoraFecha(){
	$sql = "SELECT horaPropuesta, fechaPropuesta FROM ENFRENTAMIENTO WHERE idEnfrentamiento = '$this->idEnfrentamiento'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$tupla = mysqli_fetch_assoc($result);		  
		return $tupla;
	}
	else{
		return  false;
	}
}
//Funcion identica pero para Enfrentamient_Ronda
function getHoraFechaEnfRonda(){
	$sql = "SELECT horaPropuesta, fechaPropuesta FROM ENFRENTAMIENTO_RONDA WHERE idEnfrentamientoRonda = '$this->idEnfrentamiento'";
	$result = $this->mysqli->query($sql);  
	if($result ->num_rows >0){
		$tupla = mysqli_fetch_assoc($result);		  
		return $tupla;
	}
	else{
		return  false;
	}
}
function insertHoraFecha($hora,$fecha){
		$sql = "UPDATE `ENFRENTAMIENTO` SET fechaPropuesta = '$fecha', horaPropuesta = '$hora' WHERE `idEnfrentamiento`='$this->idEnfrentamiento'";
		if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
				return 'Error en la inserción';
		}else{ //si no da error en la insercion devolvemos mensaje de exito
			return 'Fecha y hora propuestas'; //operacion de insertado correcta
		}	
}
function insertHoraFechaEnfRonda($hora,$fecha){
	$sql = "UPDATE `ENFRENTAMIENTO_RONDA` SET fechaPropuesta = '$fecha', horaPropuesta = '$hora' WHERE `idEnfrentamientoRonda`='$this->idEnfrentamiento'";
	if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
			return 'Error en la inserción';
	}else{ //si no da error en la insercion devolvemos mensaje de exito
		return 'Fecha y hora propuestas'; //operacion de insertado correcta
	}	
}
function comprobarPista($hora,$fecha){
	$sql = "SELECT restriccion FROM `PISTA` WHERE hora = '$hora' && fecha = '$fecha'";
	$result = $this->mysqli->query($sql);
	if (!$result) { // si da error en la ejecución del insert devolvemos mensaje
		return false;
	}else{ 
		if($result->num_rows>0){
			$j = 0;
			while($tupla = mysqli_fetch_array($result)){
			   $tuplas[$j] = $tupla;
			   $j++;		
			}
			$band = false;
			foreach($tuplas as $tupla){
				if($tupla[0]==0){
					$band = true;
				}
			}
			return $band;
		}
	}	
}
function getHora(){
	$array = $this->getHoraFecha();
	return $array['horaPropuesta'];
}
function getHoraEnfRonda(){
	$array = $this->getHoraFechaEnfRonda();
	return $array['horaPropuesta'];
} 
function getFechaEnfRonda(){
	$array = $this->getHoraFechaEnfRonda();
	return $array['fechaPropuesta'];
}
function getFecha(){
	$array = $this->getHoraFecha();
	return $array['fechaPropuesta'];
}
function cancelPropuesta(){
	$sql = "UPDATE `ENFRENTAMIENTO` SET fechaPropuesta = null, horaPropuesta = null WHERE `idEnfrentamiento`='$this->idEnfrentamiento'";
		if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
				return 'Error en la inserción';
		}else{ //si no da error en la insercion devolvemos mensaje de exito
			return 'Fecha y hora rechazadas'; //operacion de insertado correcta
		}
}
function cancelPropuestaRonda(){
	$sql = "UPDATE `ENFRENTAMIENTO_RONDA` SET fechaPropuesta = null, horaPropuesta = null WHERE `idEnfrentamientoRonda`='$this->idEnfrentamiento'";
		if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
				return 'Error en la inserción';
		}else{ //si no da error en la insercion devolvemos mensaje de exito
			return 'Fecha y hora rechazadas'; //operacion de insertado correcta
		}
}
function aceptarPropuesta(){
	$hora = $this->getHora();
	$fecha = $this->getFecha();
	if($this->comprobarPista($hora,$fecha)){
		$pista = $this->getPistasDisponibles($hora,$fecha);
		if(!$pista){
			return "Pistas no disponibles para esa hora/fecha.";
		}else{
				return $this->asignarPista($pista);
		}
	}else{
		return "No se puede asignar pista en esa hora/fecha";
	}
}
function aceptarPropuestaRonda(){
	$hora = $this->getHoraEnfRonda();
	$fecha = $this->getFechaEnfRonda();
	if($this->comprobarPista($hora,$fecha)){
		$pista = $this->getPistasDisponibles($hora,$fecha);
		if(!$pista){
			return "Pistas no disponibles para esa hora/fecha.";
		}else{
			return $this->asignarPistaRonda($pista);
		}
	}else{
		return "No se puede asignar pista en esa hora/fecha";
	}
}

function getPistasDisponibles($hora,$fecha){
	$sql = "SELECT idPista,nombre FROM `PISTA` WHERE hora = '$hora' && fecha = '$fecha' && restriccion = '0'";
		$result = $this->mysqli->query($sql);
		if($result->num_rows>0){
			$j = 0;
			while($tupla = mysqli_fetch_array($result)){
			   $tuplas[$j] = $tupla;
			   $j++;		
			}
			return $tuplas[0];
		}else
			return false;
}

function asignarPista($pista){
	//Pista es un array con idPista y nombre
	$idpista = $pista['idPista'];
	$nombre = $pista['nombre'];
	$sql = "INSERT INTO `PISTA_ENFRENTAMIENTO`(`PistaidPista`, `EnfrentamientoidEnfrentamiento`, `Pistanombre`) VALUES ('$idpista','$this->idEnfrentamiento','$nombre')";
	if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
		return 'Error en la inserción en pista_enfrentamiento';
	}
	else{ 
		$sqlUp = "UPDATE PISTA SET 
					restriccion = 1				
				WHERE ( idPista = '$idpista'
				)";
			if (!($resul = $this->mysqli->query($sqlUp))){
				return 'Error en la reserva'; 
			}else{
				return 'Reservado correctamente para el enfrentamiento';
			}
	}
}
function asignarPistaRonda($pista){
		//Pista es un array con idPista y nombre
		$idpista = $pista['idPista'];
		$nombre = $pista['nombre'];
		$sql = "INSERT INTO `PISTA_ENFRENTAMIENTO_RONDA`(`PistaidPista`, `Enfrentamiento_RondaidEnfrentamientoRonda`, `Pistanombre`) VALUES ('$idpista','$this->idEnfrentamiento','$nombre')";
		if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
			return 'Error en la inserción en pista_enfrentamiento';
		}
		else{ 
			$sqlUp = "UPDATE PISTA SET 
						restriccion = 1				
					WHERE ( idPista = '$idpista'
					)";
				if (!($resul = $this->mysqli->query($sqlUp))){
					return 'Error en la reserva'; 
				}else{
					return 'Reservado correctamente para el enfrentamiento';
				}
		}
}

function isAsigned(){
	$sql = "SELECT * FROM `PISTA_ENFRENTAMIENTO` WHERE `EnfrentamientoidEnfrentamiento`= '$this->idEnfrentamiento'";
	$result = $this->mysqli->query($sql);
	if($result->num_rows>0){
		return true;
	}else{
		return false;
	}
}
function isAsignedRonda(){
	$sql = "SELECT * FROM `PISTA_ENFRENTAMIENTO_RONDA` WHERE `Enfrentamiento_RondaidEnfrentamientoRonda`= '$this->idEnfrentamiento'";
	$result = $this->mysqli->query($sql);
	if($result->num_rows>0){
		return true;
	}else{
		return false;
	}
}

function getGrupos()
{
	$sql = "SELECT `idGrupo` FROM GRUPO WHERE idCategoria='$this->GrupoIdCategoria'";
	 // se ejecuta la query
	 $result = $this->mysqli->query($sql);
	 // var_dump($result);
		   //exit();
	   if($result->num_rows>0){
		   //
		   $j = 0;
		   while($tupla = mysqli_fetch_array($result)){
			  $tuplas[$j] = $tupla;
			  $j++;		
		   }
		   return $tuplas;
	   }else{
		   return false;
	   }
}


function ADD_CUARTOS($array)
{

        $sql = "SELECT * FROM ENFRENTAMIENTO_RONDA WHERE (idEnfrentamientoRonda = '$this->GrupoIdCategoria CUA 0')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el contidPareja1ador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el idEnfrentamiento)
				//construimos la sentencia sql de inserción en la bd
				for($i=0;$i<8;$i++){

					$pareja1 = $array[$i][0];
					$pareja2 = $array[$i+1][0];
					//construimos la sentencia sql de inserción en la bd
					$sql = "INSERT INTO `ENFRENTAMIENTO_RONDA`(`idEnfrentamientoRonda`, `idPareja1`, `idPareja2`, `CategoriaidCategoria`, `CategoriaidCampeonato`,`set1`, `set2`, `set3` ) 
					VALUES ('$this->GrupoIdCategoria CUA $i',
							'$pareja1',
							'$pareja2',
							'$this->GrupoIdCategoria',
							'$this->GrupoIdCampeonato',
							'0-0',
							'0-0',
							'0-0')";
					if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
						echo 'Error en la inserción';
					}
					else{ //si no da error en la insercion devolvemos mensaje de exito
						echo 'Inserción realizada con éxito'; //operacion de insertado correcta
					}
					$i++;
				}

				}
			else // si ya existe ese valor de clave en la tabla devolvemos el mensaje correspondiente
				return 'Ya existe en la base de datos'; // ya existe
		}

				
			}

function ADD_SEMIS($array)
{

        $sql = "SELECT * FROM ENFRENTAMIENTO_RONDA WHERE (idEnfrentamientoRonda = '$this->GrupoIdCategoria SEM 0')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el contidPareja1ador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el idEnfrentamiento)
				//construimos la sentencia sql de inserción en la bd
				for($i=0;$i<4;$i++){

					$pareja1 = $array[$i][0];
					$pareja2 = $array[$i+1][0];
					//construimos la sentencia sql de inserción en la bd
					$sql = "INSERT INTO `ENFRENTAMIENTO_RONDA`(`idEnfrentamientoRonda`, `idPareja1`, `idPareja2`, `CategoriaidCategoria`, `CategoriaidCampeonato`,`set1`, `set2`, `set3` ) 
					VALUES ('$this->GrupoIdCategoria SEM $i',
							'$pareja1',
							'$pareja2',
							'$this->GrupoIdCategoria',
							'$this->GrupoIdCampeonato',
							'0-0',
							'0-0',
							'0-0')";
					if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
						echo 'Error en la inserción';
					}
					else{ //si no da error en la insercion devolvemos mensaje de exito
						echo 'Inserción realizada con éxito'; //operacion de insertado correcta
					}
					$i++;
				}

				}
			else // si ya existe ese valor de clave en la tabla devolvemos el mensaje correspondiente
				return 'Ya existe en la base de datos'; // ya existe
		}

				
			}

function ADD_FINAL($array)
{

        $sql = "SELECT * FROM ENFRENTAMIENTO_RONDA WHERE (idEnfrentamientoRonda = '$this->GrupoIdCategoria FIN 0')";

		if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el contidPareja1ador manejara
		}
		else { // si la ejecución de la query no da error
			if ($result->num_rows == 0){ // miramos si el resultado de la consulta es vacio (no existe el idEnfrentamiento)
				//construimos la sentencia sql de inserción en la bd
				for($i=0;$i<2;$i++){

					$pareja1 = $array[$i][0];
					$pareja2 = $array[$i+1][0];
					//construimos la sentencia sql de inserción en la bd
					$sql = "INSERT INTO `ENFRENTAMIENTO_RONDA`(`idEnfrentamientoRonda`, `idPareja1`, `idPareja2`, `CategoriaidCategoria`, `CategoriaidCampeonato`,`set1`, `set2`, `set3` ) 
					VALUES ('$this->GrupoIdCategoria FIN 0',
							'$pareja1',
							'$pareja2',
							'$this->GrupoIdCategoria',
							'$this->GrupoIdCampeonato',
							'0-0',
							'0-0',
							'0-0')";
					if (!$this->mysqli->query($sql)) { // si da error en la ejecución del insert devolvemos mensaje
						echo 'Error en la inserción';
					}
					else{ //si no da error en la insercion devolvemos mensaje de exito
						echo 'Inserción realizada con éxito'; //operacion de insertado correcta
					}
					$i++;
				}

				}
			else // si ya existe ese valor de clave en la tabla devolvemos el mensaje correspondiente
				return 'Ya existe en la base de datos'; // ya existe
		}

				
			}


function getResultadosCuartos(){
	// se construye la sentencia de busqueda de la tupla en la bd
	/** SELECT g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c, GRUPO g 
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND g.idGrupo = '$this->idGrupo' AND GrupoidCampeonato = c.idCampeonato AND e.idGrupo=g.idGrupo AND p1.login1 != p2.login1 AND  p1.login1 != p2.login2 AND p1.login2 != p2.login1 AND p1.login2 != p2.login2 AND e.GrupoidCampeonato='$this->GrupoIdCampeonato')*/
    $sql = "SELECT e.idEnfrentamientoRonda,p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO_RONDA e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND CategoriaidCampeonato = c.idCampeonato AND cat.idCategoria = e.CategoriaidCategoria AND e.idEnfrentamientoRonda LIKE '$this->GrupoIdCategoria CUA%')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
	// var_dump($result);
		  //exit();
	  if($result->num_rows>0){
		  //
		  $j = 0;
		  while($tupla = mysqli_fetch_array($result)){
			 $tuplas[$j] = $tupla;
			 $j++;		
		  }
		  return $tuplas;
	  }else{
		  return false;
	  }
}

function getResultadosSemis(){
	// se construye la sentencia de busqueda de la tupla en la bd
	/** SELECT g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c, GRUPO g 
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND g.idGrupo = '$this->idGrupo' AND GrupoidCampeonato = c.idCampeonato AND e.idGrupo=g.idGrupo AND p1.login1 != p2.login1 AND  p1.login1 != p2.login2 AND p1.login2 != p2.login1 AND p1.login2 != p2.login2 AND e.GrupoidCampeonato='$this->GrupoIdCampeonato')*/
    $sql = "SELECT e.idEnfrentamientoRonda,p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO_RONDA e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND CategoriaidCampeonato = c.idCampeonato AND cat.idCategoria = e.CategoriaidCategoria AND e.idEnfrentamientoRonda LIKE '$this->GrupoIdCategoria SEM%')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
	// var_dump($result);
		  //exit();
	  if($result->num_rows>0){
		  //
		  $j = 0;
		  while($tupla = mysqli_fetch_array($result)){
			 $tuplas[$j] = $tupla;
			 $j++;		
		  }
		  return $tuplas;
	  }else{
		  return false;
	  }
}

function getResultadosFinal(){
	// se construye la sentencia de busqueda de la tupla en la bd
	/** SELECT g.idGrupo, p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, g.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c, GRUPO g 
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND g.idGrupo = '$this->idGrupo' AND GrupoidCampeonato = c.idCampeonato AND e.idGrupo=g.idGrupo AND p1.login1 != p2.login1 AND  p1.login1 != p2.login2 AND p1.login2 != p2.login1 AND p1.login2 != p2.login2 AND e.GrupoidCampeonato='$this->GrupoIdCampeonato')*/
    $sql = "SELECT e.idEnfrentamientoRonda,p1.login1,p1.login2,p2.login1,p2.login2,c.nombre, cat.nivel,`set1`, `set2`, `set3`, p1.idPareja,p2.idPareja, c.idCampeonato, cat.idCategoria
	FROM ENFRENTAMIENTO_RONDA e, PAREJA p1, PAREJA p2, CATEGORIA cat, CAMPEONATO c
	WHERE (e.idPareja1 = p1.idPareja AND e.idPareja2 = p2.idPareja AND CategoriaidCampeonato = c.idCampeonato AND cat.idCategoria = e.CategoriaidCategoria AND e.idEnfrentamientoRonda LIKE '$this->GrupoIdCategoria FIN%')";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
	// var_dump($result);
		  //exit();
	  if($result->num_rows>0){
		  //
		  $j = 0;
		  while($tupla = mysqli_fetch_array($result)){
			 $tuplas[$j] = $tupla;
			 $j++;		
		  }
		  return $tuplas;
	  }else{
		  return false;
	  }
}

}
?> 