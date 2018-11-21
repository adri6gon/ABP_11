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
	
	 if (($this->idCategoria <> '')){ // si el atributo clave de la entidad no esta vacio

	 	// construimos el sql para buscar esa clave en la tabla
        $sql = "SELECT ParejaidPareja FROM CATEGORIA_PAREJA WHERE (CategoriaidCategoria = '$this->idCategoria')";
        $sql2 = "SELECT genero, nivel, idCampeonato FROM CATEGORIA WHERE (idCategoria = '$this->idCategoria')";

         $result2 = $this->mysqli->query($sql2);
		 $result = $this->mysqli->query($sql);
		 //Si el número de parejas es superior a 0
         if($result->num_rows>0){
        if (!$result = $this->mysqli->query($sql)){ // si da error la ejecución de la query
			return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd). Devolvemos un mensaje que el controlador manejara
		}else{
			$aux = 0;
			$tupla = mysqli_fetch_assoc($result2);
			while ($fila = mysqli_fetch_row($result)) {
				$parejas[$aux] = $fila;
				$aux++;
			}
			$nombre = $tupla['nivel'].$tupla['genero'];
			$band = false;
			$idCampeonato = $tupla['idCampeonato'];
			$j = 0;

			$sql4 = "SELECT idGrupo FROM GRUPO WHERE (idCategoria = '$this->idCategoria') AND (idCampeonato = $idCampeonato)";
			//var_dump($sql4);
			$result4 = $this->mysqli->query($sql4);
			if(!$result4->num_rows>0){
				//Grupos de 8 parejas
				if(($result->num_rows%16)==0){
					$jug = 8;
				//Calculamos el número de grupos que crearemos
				for($i = ($result->num_rows/8); $i > 0; $i--){

					$sql3 = "INSERT INTO `GRUPO`(`idGrupo`, `nombre`, `idCategoria`, `idCampeonato`) 
						VALUES ('',
							'$nombre $i',
							'$this->idCategoria',
							'$idCampeonato')";

					if ($this->mysqli->query($sql3)) { // si da error en la ejecución del insert devolvemos mensaje
						$band = true;
					}
					else{ //si no da error en la insercion devolvemos mensaje de exito
						$band = false;
					}

						$idGruop = $this->mysqli->insert_id;
					for($j; $j < $jug; $j++){
						//INSERT EN GRUPO_PAREJA
						$pareja = $parejas[$j][0];
						//echo $idGruop." ".$this->idCategoria." ".$idCampeonato." ".$pareja."\n";

						$sql5 = "INSERT INTO `GRUPO_PAREJA`(`GrupoidGrupo`, `GrupoidCategoria`, `GrupoidCampeonato`, `ParejaidPareja`) 
						VALUES ('$idGruop',
							'$this->idCategoria',
							'$idCampeonato',
							'$pareja')";

						if ($this->mysqli->query($sql5)) { // si da error en la ejecución del insert devolvemos mensaje
							$band = true;
						}
						else{ //si no da error en la insercion devolvemos mensaje de exito
							$band = false;
						}
					}
					$jug = $jug + 8;

				}


						if (!$band) { // si da error en la ejecución del insert devolvemos mensaje
					return 'Error en la inserción';
				}
				else{ //si no da error en la insercion devolvemos mensaje de exito
					return 'Inserción realizada con éxito'; //operacion de insertado correcta
				}

					//Grupos de 10 parejas
				}else if(($result->num_rows%20)==0){
				//Calculamos el número de grupos que crearemos
					$jug = 10;
				for($i = ($result->num_rows/10); $i > 0; $i--){
					//4 3 2 1
					$sql3 = "INSERT INTO `GRUPO`(`idGrupo`, `nombre`, `idCategoria`, `idCampeonato`) 
						VALUES ('',
							'$nombre $i',
							'$this->idCategoria',
							'$idCampeonato')";

					if ($this->mysqli->query($sql3)) { // si da error en la ejecución del insert devolvemos mensaje
						$band = true;
					}
					else{ //si no da error en la insercion devolvemos mensaje de exito
						$band = false;
					}

						$idGruop = $this->mysqli->insert_id;
					for($j; $j < $jug; $j++){
						//20/4->5 0-4 //20/3->6 //20/2->10 
						//INSERT EN GRUPO_PAREJA
						$pareja = $parejas[$j][0];
						//echo $idGruop." ".$this->idCategoria." ".$idCampeonato." ".$pareja."\n";

						$sql5 = "INSERT INTO `GRUPO_PAREJA`(`GrupoidGrupo`, `GrupoidCategoria`, `GrupoidCampeonato`, `ParejaidPareja`) 
						VALUES ('$idGruop',
							'$this->idCategoria',
							'$idCampeonato',
							'$pareja')";

						if ($this->mysqli->query($sql5)) { // si da error en la ejecución del insert devolvemos mensaje
							$band = true;
						}
						else{ //si no da error en la insercion devolvemos mensaje de exito
							$band = false;
						}
					}
					$jug= $jug+10;

				}


						if (!$band) { // si da error en la ejecución del insert devolvemos mensaje
					return 'Error en la inserción';
				}
				else{ //si no da error en la insercion devolvemos mensaje de exito
					return 'Inserción realizada con éxito'; //operacion de insertado correcta
				}
					//Grupos de 12 parejas
				}else if(($result->num_rows%24)==0){
					$jug = 12;
				//Calculamos el número de grupos que crearemos
				for($i = ($result->num_rows/12); $i > 0; $i--){

					$sql3 = "INSERT INTO `GRUPO`(`idGrupo`, `nombre`, `idCategoria`, `idCampeonato`) 
						VALUES ('',
							'$nombre $i',
							'$this->idCategoria',
							'$idCampeonato')";

					if ($this->mysqli->query($sql3)) { // si da error en la ejecución del insert devolvemos mensaje
						$band = true;
					}
					else{ //si no da error en la insercion devolvemos mensaje de exito
						$band = false;
					}

						$idGruop = $this->mysqli->insert_id;
					for($j; $j < $jug; $j++){
						//INSERT EN GRUPO_PAREJA
						$pareja = $parejas[$j][0];
						//echo $idGruop." ".$this->idCategoria." ".$idCampeonato." ".$pareja."\n";

						$sql5 = "INSERT INTO `GRUPO_PAREJA`(`GrupoidGrupo`, `GrupoidCategoria`, `GrupoidCampeonato`, `ParejaidPareja`) 
						VALUES ('$idGruop',
							'$this->idCategoria',
							'$idCampeonato',
							'$pareja')";

						if ($this->mysqli->query($sql5)) { // si da error en la ejecución del insert devolvemos mensaje
							$band = true;
						}
						else{ //si no da error en la insercion devolvemos mensaje de exito
							$band = false;
						}
					}
					$jug = $jug +12;

				}


						if (!$band) { // si da error en la ejecución del insert devolvemos mensaje
					return 'Error en la inserción';
				}
				else{ //si no da error en la insercion devolvemos mensaje de exito
					return 'Inserción realizada con éxito'; //operacion de insertado correcta
				}

						//Si el numero de parejas no permite grupos de 8 10 o 12
				} else{
					return 'El número de parejas no permite la generación de grupos.'; //Número incorrecto de parejas
				}

		 	} else{
		 		return 'Ya existen grupos para esta Categoria'; // introduzca un valor para la categoria
			 }
		} /////7
		} else{
	 	return 'No hay parejas asignadas a esta categoria'; // introduzca un valor para la categoria
	 	}
	}else{
		return 'Introduzca una categoria'; // introduzca un valor para la categoria
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