/**
Funcion del archivo: Archivo con las diferentes validaciones(las exigidas en la ET1) y las validaciones extras necesarias para la validacion de todos los formularios.
Autor: j0z5zs
Fecha: 23/12/17
**/

/**La mayoria de las funciones de validacion tienen una "doble funcion" estas deben devolver un boolean
con el fin de poder habilitar o inhabilitar el boton de submit de los diferentes formularios(o como 
funcion auxiliar de las funciones de validacion de los formularios de busqueda) y colorear
los bordes de aquellos campos que no estan correctamente cubiertos(FUNCIONES PARA COLOREAR BORDES)**/
/**Funcion que comprueba si el campo no esta vacio**/
function comprobarVacio(campo){
	//Obtenemos el valor que contiene el campo
	var valor = campo.value;
	//Comprobamos si el campo esta vacio(true) o no(false)
	if( valor=="" ){
		return true;		
	}
	//No es vacio retornamos false
	else{
		return false;
	}
}
/**Funcion que comprueba si el campo es de tipo texto**/
function comprobarTexto(campo, size){
	//Obtenemos el valor que contiene el campo
	var valor = campo.value;
	//Comprobamos que el campo no se a vacio y no supere el tamaño delimitado
	if( valor.length>size || comprobarVacio(campo) ) {
		elementoInvalido(campo);
		return false;
	}
		//Si cumple las condiciones anteriores es un elemento valido.
	else{
		elementoValido(campo);
		return true;
	}
	
}
/**Funcion que comprueba si el campo es de tipo Alfabetico**/
function comprobarAlfabetico(campo, size){
	//Obtenemos el valor que contiene el campo
	var valor = campo.value;
	//Comprobamos si el campo tiene almacenadas letras, que no sobrepase el limite y que no este vacio
	if(!/^[a-zA-Z \s]*$/.test(valor) || valor.length>size || comprobarVacio(campo)){
		elementoInvalido(campo);
		return false;
	}
	//Si cumple las condiciones anteriores es un elemento valido.
	else{
		elementoValido(campo);
		return true;
	}
}
/**Funcion que comprueba si el campo es un numero entero comprendido
entre dos valores(valormenor,valormayor)**/
function comprobarEntero(campo, valormenor, valormayor){
//Hacemos un parse a numero entero, si no era un entero este no lo parsea
	var valor = parseInt(campo.value);
		//Ahora comprobamos si es Integer, si esta dentro del rango de valores y si no esta el campo vacio
	if (isNaN(valor)|| valor<valormenor || valor>valormayor || comprobarVacio(campo)) { 
		elementoInvalido(campo);
		return false;
	}
	//Si valor es un Integer, esta entre los dos valors y no esta vacio valor es un entero valido
	else{
		elementoValido(campo);
		return true;
	}
}
/**Funcion que comprueba si el campo es un numero decimal comprendido
entre dos valores(valormenor,valormayor)**/
function comprobarReal(campo, numerodecimales, valormenor, valormayor){
	//Obtenemos el valor que contiene el campo
	var valor = campo.value;
	//Comprobamos si el valor cumple o no la expresion regular de numero Real
	if(!/^-?[0-9]+([,\.][0-9]*)?$/.test(valor) || valor<valormenor || valor>valormayor || comprobarVacio(campo) ){
		elementoInvalido(campo);
		return false;
	}
	//Si cumple la expresion regular, esta entre los dos valores es un real valido
	else{
		elementoValido(campo);
		return true;
	}
}
/**Funcion que comprueba si el telefono existe y es correcto**/
function comprobarTelf(campo){
	//Obtenemos el valor que contiene el campo
	var valor = campo.value;
	//Comprobamos que el campo tiene 9 digitos y comienza con +34 o 0034 o 34 
	if( !/^(\34)?[6|7|9][0-9]{8}$/.test(valor) || comprobarVacio(campo)) {
	  elementoInvalido(campo);
	  return false;
	}	
	//Si cumple la expresion regular y no esta vacio es un telefono valido
	else{
		elementoValido(campo);
		return true;
	}
}
/**Funcion de validación de dni en formularios**/
function comprobarDNI(campo) {
	//Variable donde almacenamos el valor del campo
   var valor = campo.value;
   //Variable donde almacenamos el numero del DNI
    var numero;
	//Variable donde almacenamos la letra del DNI introducido
    var letr;
	//Variable donde almacenamos la letra que DEBERIA tener DNI para que fuese correcto
    var letra;
	//Variable donde almacenamos la expresion regular de un DNI
    var expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
	//Comprobamos que el valor corresponda a la expresion regular
  if (expresion_regular_dni.test(valor) == true) {
     numero = valor.substr(0,valor.length-1);
     letr = valor.substr(valor.length-1,1);
     numero = numero % 23;
     letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
     letra = letra.substring(numero,numero + 1);
	 //Comprobamos que la letra introducida sea la misma que la que deberia tener el numero introducido
    if (letra != letr.toUpperCase()) {
       elementoInvalido(campo);
		return false;
     }
	//Si el DNI pasado cumple la expresion regular y la letra coincide con la que calculas que deberia llevar el DNI pasado es un DNI valido
	 else {
       elementoValido(campo);
		return true;
     }
  }
  //Si no cumple la expresion regular no puede ser un DNI valido
  else {
    elementoInvalido(campo);
	return false;
   }
}
/**Funcion que comprueba si el campo es una fecha.**/
function comprobarFecha(campo){
	//Comprueba que la fecha no este vacia y que no tenga espacios ya que el formato es mm/dd/aaaa
	if(!comprobarVacio(campo) && comprobarTextoSin(campo,campo.size)){
		elementoValido(campo);
		return true;
	}
		//Si cumple las condiciones anteriores es un elemento invalido.
	else{
		elementoInvalido(campo);
		return false;
	}
	
}
/**Funcion que comprueba si el campo es de tipo texto sin espacios**/
function comprobarTextoSin(campo, size){
	//Obtenemos el valor que contiene el campo
	var valor = campo.value;
	//Comprobamos que el campo sea texto y no tenga espacios en blanco
	if( valor.length>size || /\s/.test(valor)) {
	  elementoInvalido(campo);
	  return false;
	  
	}
	//Si cumple las condiciones anteriores es texto sin espacios retornamos true
	else{
	  elementoValido(campo);
	  return true;
	}
	
}
/**Funcion que comprueba que el campo sea un email correcto**/
function comprobarEmail(campo){
	//Obtenemos el valor que contiene el campo
	 var valor = campo.value;
	//Comprobamos si el campo cumple la expresion regular y no esta vacio
	if(comprobarVacio(campo) || !/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(valor) ) {
		elementoInvalido(campo);
		return false;
	}
	//Si cumple la expresion regular y no esta vacio es un email valido
	else{
		elementoValido(campo);
		return true;
	}
}
/**********************FUNCIONES PARA PINTAR BORDES************************/
//Funcion que colorea el borde del campo que esta incorrectamente cubierto(rojo)
function elementoInvalido(campo){
	campo.style.borderColor = "red";
}
//Funcion que colorea el borde del campo que esta correctamente cubierto(verde)
function elementoValido(campo){
	campo.style.borderColor = "green";
}
/**Esta funcion es solamente para los formularios de busqueda ya que esta vuelve
a colorear los bordes del color inicial(correctamente)**/
function elementoValidoSearch(campo){
	campo.style.borderColor = "#b7b7b7";
}
/****************************FUNCIONES SEARCH******************************/
/*Funciones especificas para la validacion de los formularios de busqueda de la web*/
/*Funcion que comprueba que el campo contiene texto(puede tener espacios) y que no sobrepase el tamaño limite*/
function comprobarTextoSearch(campo,size){
	//Comprueba si esta o no vacio el campo
	if(!comprobarVacio(campo)){
		//Comprueba si contiene texto y no sobrepasa el limite
		if(!comprobarTexto(campo,size)){
			elementoInvalido(campo);
			return false;
		}
		//Si solo contiene y no sobrepasa el limite es un elemento valido 
		else{
			elementoValidoSearch(campo);
			return true;
		}
	}
	//Si esta vacio el elemento es valido, ya que no tiene porque tener cubierto todos los campos(es mas puede buscar en vacio)
	else{
			elementoValidoSearch(campo);
			return true;
	}
}
/*Funcion que comprueba que el campo contiene texto(no puede tener espacios) y que no sobrepase el tamaño limite*/
function comprobarTextoSinSearch(campo,size){
	//Comprueba si esta o no vacio el campo
	if(!comprobarVacio(campo)){
		//Comprueba si contiene texto sin espacios y no sobrepasa el limite
		if(!comprobarTextoSin(campo,size)){
			elementoInvalido(campo);
			return false;
		}//Si no contiene texto con espacios y no sobrepasa el limite es un elemento valido
		else{
			elementoValidoSearch(campo);
			return true;
		}
	}
	//Si esta vacio el elemento es valido, ya que no tiene porque tener cubierto todos los campos(es mas puede buscar en vacio)
	else{
			elementoValidoSearch(campo);
			return true;
	}
}
/*Funcion que comprueba que el campo solo tenga caracteres alfabeticos y que este campo no sobrepase el limite*/
function comprobarAlfabeticoSearch(campo,size){
	//Comprobamos si esta vacio el campo o no
	if(!comprobarVacio(campo)){
		//Obtenemos el valor que contiene el campo
		var valor = campo.value;
		//Comprobamos si el campo tiene almacenadas letras y si no esta vacio
		if(!/^[a-zA-Z \s]*$/.test(valor) || valor.length>size){
			elementoInvalido(campo);
			return false;
		}
		//Cumple la expresion regular y no es mayor que el tamaño permitido, entonces es valido
		else{
			elementoValidoSearch(campo);
			return true;
		}
	}
	//Si esta vacio el elemento es valido, ya que no tiene porque tener cubierto todos los campos(es mas puede buscar en vacio)
	else{
		elementoValidoSearch(campo);
		return true;
	}
}
/*Funcion que comprueba que el campo contenga solo numeros enteros comprendidos en un rango(menor,mayor)*/
function comprobarEnteroSearch(campo,menor,mayor){
	//Comprobamos si esta vacio el campo o no
	if(!comprobarVacio(campo)){
		//Hacemos un parse a numero entero, si no era un entero este no lo parsea
		var valor = parseInt(campo.value);
			//Ahora comprobamos si lo ha convertido a Integer o no y si esta dentro del rango
		if (isNaN(valor)|| valor<menor || valor>mayor) { 
			elementoInvalido(campo);
			return false;
		}
		//Si es un integer y esta dentro del rango el numero entero es valido
		else{
			elementoValidoSearch(campo);
			return true;
		}
	}
	//Si esta vacio el elemento es valido, ya que no tiene porque tener cubierto todos los campos(es mas puede buscar en vacio)
	else{
		elementoValidoSearch(campo);
		return true;
	}
}








