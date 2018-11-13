<?php

//Clase : CATEGORIAS_Modelo
class PARTIDOS_Model {
	var $idPartido;
    var $Usuariologin;
	var $fecha;
    var $hora;
    var $pista;
    var $promo;
	
//Constructor de la clase
function __construct($idPartido,$Usuariologin,$fecha,$hora, $pista, $promo){
	$this->idPartido = $idPartido;
	$this->Usuariologin = $Usuariologin;
	$this->fecha = $fecha;
    $this->hora = $hora;
    $this->pista = $pista;
    $this->promo = $promo;
	include_once 'Access_DB.php';
	$this->mysqli = ConnectDB();
}

// function RellenaDatos(){
//     $sql = "SELECT `idCategoria`, `genero`, `nivel`, `idCampeonato` from CATEGORIA where idCategoria = '$this->idCategoria'";
// 	$result = $this->mysqli->query($sql);  
// 	if($result ->num_rows >0){
// 		$tupla = mysqli_fetch_assoc($result);		  
// 		return $tupla;
// 	}
// 	else{
// 		return  false;
// 	}
// }

// function RellenaDatosCampeonato(){
//     $sql = "SELECT `idCampeonato`, `nombre` FROM CAMPEONATO";
// 	$result = $this->mysqli->query($sql);  
// 	if($result ->num_rows >0){
// 		$j = 0;
// 		while($tupla = mysqli_fetch_assoc($result)){
// 		   $tuplas[$j] = $tupla;
// 		   $j++;		
// 		}
// 		return $tuplas;
// 	}
// 	else{
// 		return  false;
// 	}
// }

function _SHOWALL(){
	$sql = "SELECT * FROM PARTIDO";
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
       $sql = "SELECT * from PARTIDO where idPartido = '".$this->idPartido."'";
       $idPista = $this->selectidPistaAux();
       $result = $this->mysqli->query($sql);
        if ($result->num_rows == 0){
            return 'El partido no existe, no se puede borrar.';
        }
        else{
            $sqlBorrarPista = "DELETE FROM PISTA_PARTIDO WHERE PartidoidPartido = '".$this->idPartido."' AND  PistaidPista = '$idPista'";
            if(!$this->mysqli->query($sqlBorrarPista)){
                return 'Error en el borrado PISTA_PARTIDO.';
            }else{ 
                $this->modifyRestriccionPista($idPista,0);
                $sqlBorrar = "DELETE FROM PARTIDO WHERE idPartido = '".$this->idPartido."'";
                if(!$this->mysqli->query($sqlBorrar)){
                    return 'Error en el borrado del partido.';
                } else {
                    return 'Borrado realizado con exito.';
                }
            }
        }
}


function selectidPistaAux(){
    $sql = "SELECT PistaidPista FROM PISTA_PARTIDO WHERE PartidoidPartido = '$this->idPartido'";
    $result = $this->mysqli->query($sql)->fetch_array();
    return $result['PistaidPista'];
}

function _SHOWPISTASFREE(){
	$sql = "SELECT DISTINCT nombre FROM PISTA WHERE restriccion = 0 ORDER BY nombre" ;
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



 function checkDatesFree(){
    $sqlDates = "SELECT DISTINCT fecha FROM PISTA WHERE restriccion = 0 AND nombre = '$this->pista'";
    $result = $this->mysqli->query($sqlDates);
    if($result ->num_rows >0){
		$j = 0;
		while($tupla = mysqli_fetch_assoc($result)){
		   $tuplas[$j] = $tupla;
		   $j++;		
		}
		return $tuplas;
	}
 }

function selectHourFree(){
    $sqlHour = "SELECT DISTINCT hora FROM PISTA WHERE restriccion = 0 AND fecha = '$this->fecha' AND nombre = '$this->pista' LIMIT 1";
    $result = $this->mysqli->query($sqlHour)->fetch_array();
    return $result['hora'];
}
    
function selectidPista(){
        $sql = "SELECT idPista FROM PISTA WHERE nombre = '$this->pista'";
        $result = $this->mysqli->query($sql)->fetch_array();
        return $result['idPista'];
}

function modifyRestriccionPista($idPista,$bool){
    $sql = "UPDATE PISTA SET 
					restriccion = $bool					
                WHERE idPista = $idPista";

    if(!$this->mysqli->query($sql)){
        return false;
    }else{ 
        return true;
    } 
}


function Promocionar (){
    $sql = "UPDATE PARTIDO SET promo = 1					
            WHERE idPartido = $this->idPartido";
    if(!$this->mysqli->query($sql)){
        return 'Error al promocionar el partido';
    }else{ 
        return 'El partido se ha promocionado con éxito';
    } 
}

function Despromocionar (){
    $sql = "UPDATE PARTIDO SET promo = 0					
            WHERE idPartido = $this->idPartido";
    if(!$this->mysqli->query($sql)){
        return 'Error al despromocionar el partido';
    }else{ 
        return 'El partido se ha despromocionado con éxito';
    } 
}

function ADD(){

    $datesFree = $this->checkDatesFree();
    //var_dump($datesFree);

    for($j=0; $j<count($datesFree); $j++){
        if($datesFree[$j]["fecha"] == $this->fecha){
            $hora = $this->selectHourFree();
            if(isset($hora)){
                $sqlPartido = "INSERT INTO `PARTIDO` (`Usuariologin`, `fecha`, `hora`) 
                VALUES ('$this->Usuariologin',
                        '$this->fecha',
                        '$hora')";
                //$sqlLastId = "SET @last_id_in_table1 = LAST_INSERT_ID()";
                if (!$this->mysqli->query($sqlPartido)) { // si da error en la ejecución del insert devolvemos mensaje
                    return 'Error en la inserción';
                }else{ 
                    $idPartido = $this->mysqli->insert_id;
                    $idPista = $this->selectidPista();
                    $sqlPistaPartido = "INSERT INTO `PISTA_PARTIDO` (`PistaidPista`, `PartidoidPartido`, `Pistanombre`) 
                    VALUES ('$idPista',
                            '$idPartido',
                            '$this->pista')";
                    if (!$this->mysqli->query($sqlPistaPartido)) { // si da error en la ejecución del insert devolvemos mensaje
                        return 'Error en la inserción PISTA_PARTIDO';
                    }else{  
                        $respuesta = $this->modifyRestriccionPista($idPista,1);
                        if(!$respuesta){
                            return 'Error al modificar la restricción de la pista';
                        }
                        return 'Partido añadido con éxito'; 
                }		
            }
        } 
    }
}

 return 'Error en la insercion';
	
} 

// // funcion EDIT()
// // Se comprueba que la tupla a modificar exista en base al valor de su clave primaria
// // si existe se modifica
// function EDIT()
// {
// 	// se construye la sentencia de busqueda de la tupla en la bd
//     $sql = "SELECT * FROM CATEGORIA WHERE idCategoria = '".$this->idCategoria."'";
//     // se ejecuta la query
//     $result = $this->mysqli->query($sql);
//     // si el numero de filas es igual a uno es que lo encuentra
//     if ($result->num_rows == 1)
//     {	// se construye la sentencia de modificacion en base a los atributos de la clase
// 		$sql = "UPDATE CATEGORIA SET 
// 					idCategoria = '$this->idCategoria',
// 					genero = '$this->genero',
// 					nivel = '$this->nivel',
// 					idCampeonato = '$this->idCampeonato'					
// 				WHERE ( idCategoria = '$this->idCategoria'
// 				)";
// 		// si hay un problema con la query se envia un mensaje de error en la modificacion
//         if (!($resultado = $this->mysqli->query($sql))){
// 			return 'Error en la modificación'; 
// 		}
// 		else{ 
// 			return 'Modificado correctamente.';
			
// 		}
//     }
//     else // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
//     	return 'No existe en la base de datos';
// } // fin del metodo EDIT

// function SEARCH(){
// 	if(!empty($this)){
// 		$sql = "SELECT `idCategoria`, `genero`, `nivel`, `idCampeonato` FROM CATEGORIA WHERE(
// 					(idCategoria LIKE '%$this->idCategoria%') &&
//     				(genero LIKE '%$this->genero%') &&
//     				(nivel LIKE '%$this->nivel%') &&
//     				(idCampeonato LIKE '%$this->idCampeonato%'))";
// 	}	
//     	$result = $this->mysqli->query($sql);  
//   // var_dump($result);
// 		//exit();
// 	if($result->num_rows>0){
// 		//
// 		$j = 0;
// 		while($tupla = mysqli_fetch_assoc($result)){
// 		   $tuplas[$j] = $tupla;
// 		   $j++;		
// 		}
// 		return $tuplas;
// 	}else{
// 		return false;
// 	}
// }

// function login(){
// 	$sql = "SELECT *
// 			FROM USUARIO
// 			WHERE (
// 				(login = '$this->login') 
// 			)";
// 	$resultado = $this->mysqli->query($sql);
// 	if ($resultado->num_rows == 0){
// 		return 'El login no existe';
// 	}
// 	else{
// 		$tupla = $resultado->fetch_array();
// 		if ($tupla['password'] == $this->password){
// 			return true;
// 		}
// 		else{
// 			return 'La password para este usuario no es correcta';
// 		}
// 	}
// }//fin login
// function comprobarAdmin(){
// 	$sql = "SELECT rol FROM USUARIO WHERE rol='admin' AND login = '$this->login'";
// 	$resultado = $this->mysqli->query($sql);
// 	$j = 0;
// 	while($tupla = mysqli_fetch_row($result)){
// 			$tuplas[$j] = $tupla[0];
// 			$j++;
// 	}
// 	if($tuplas == null){
// 		return false;
// 	}
// 	else{
// 		return $tuplas;
// 	}
// }
// function getRol(){
// 	$sql = "SELECT rol
// 			FROM USUARIO
// 			WHERE (
// 				(login = '$this->login') 
// 			)";
// 	$resultado = $this->mysqli->query($sql);
// 	if ($resultado->num_rows == 0){
// 		return 'El login no existe';
// 	}
// 	else{
// 		return $resultado;
// 	}		
// }

}


?>