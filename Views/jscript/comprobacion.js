//Funcion para validar el login de los usuarios
function validarLogin(){
	//Comprobamos que el usuario ha introducido texto en los inputs del login y hablitamos el boton
	if(comprobarTexto(login.login,login.login.size)&& comprobarTexto(login.contrasena,login.contrasena.size)){
		login.acceder.disabled = false;
	}
	//Si no ha introducido texto en los inputs sigue deshabilitado
	else{
		login.acceder.disabled = true;
	}
}
//Funciones para realizar la comprobacion del formulario de Añadir Usuario
function validarAnadirUser(){
	/**Si la funcion validarRegistro() devuelve true es que todos los campos del formulario 
	   estan debidamente completados entonces habilitamos el boton del submit**/
	if(validarRegistro()){
		anadirUser.insertar.disabled = false;
	}/**Si la funcion validarRegistro() devuelve un false es que alguno de los campos del formulario
		esta mal cubierto entonces mantiene deshabilitado o si estaba habilitado se deshabilita el boton de submit**/
	else{
		anadirUser.insertar.disabled = true;
	}
}
//Funcion que llama a cada una de las funciones de validacion de los campos del formulario ADD y les realiza una operacion AND y devuelve el resultado
function validarRegistro(){
	return(comprobarTexto(anadirUser.login,anadirUser.login.size) && 
			comprobarTexto(anadirUser.contrasena,anadirUser.contrasena.size) && 
			comprobarDNI(anadirUser.dni) &&
			comprobarEmail(anadirUser.email) && 
			comprobarAlfabetico(anadirUser.nombre,anadirUser.nombre.size) && 
			comprobarAlfabetico(anadirUser.apellidos,anadirUser.apellidos.size)&& 
			comprobarAlfabetico(anadirUser.direccion,anadirUser.direccion.size)&& 
			comprobarTelf(anadirUser.telefono) );
}
//Funciones para realizar la comprobacion del formulario de Modificar Usuario
function validarEditarUser(){
	/**Si la funcion validarModificacion() devuelve true es que todos los campos del formulario 
	   estan debidamente completados entonces habilitamos el boton del submit**/
	if(validarModificacion()){
		editUser.editar.disabled = false;
	}/**Si la funcion validarModificacion() devuelve un false es que alguno de los campos del formulario
		esta mal cubierto entonces mantiene deshabilitado o si estaba habilitado se deshabilita el boton de submit**/
	else{
		editUser.editar.disabled = true;
	}
}
//Funcion que llama a cada una de las funciones de validacion de los campos del formulario EDIT y les realiza una operacion AND y devuelve el resultado
function validarModificacion(){
	return(comprobarTexto(editUser.login,editUser.login.size) && 
			comprobarTexto(editUser.contrasena,editUser.contrasena.size) && 
			comprobarDNI(editUser.dni) &&
			comprobarEmail(editUser.email) && 
			comprobarAlfabetico(editUser.nombre,editUser.nombre.size) && 
			comprobarAlfabetico(editUser.apellidos,editUser.apellidos.size)&& 
			comprobarAlfabetico(editUser.direccion,editUser.direccion.size)&& 
			comprobarTelf(editUser.telefono));
}
//Funciones para realizar la comprobacion del formulario de Modificar Usuario
/*El formulario SEARCH de nuestra web puede realizar una busqueda en vacio que devolveria todos los campos de busqueda
  de la tabla(o tablas), por lo tanto el boton de submit debe partir habilitado y solamente deshabilitarse en el caso 
  de que el usuario introduciese un valor en un campo del formulario que no tuviese sentido realizar la busqueda.
  Por ejemplo: Buscar por filtro nombre y que en ese campo apareciesen digitos*/
function validarBusquedaUser(){
	/**Si la funcion validarSearch() devuelve true es que todos los campos del formulario 
	   estan debidamente completados(o vacios) entonces habilitamos el boton del submit**/
	if(!validarSearchUser()){
		searchUser.buscar.disabled = true;
	}/**Si la funcion validarSearch() devuelve un false es que alguno de los campos del formulario
		esta mal cubierto entonces se deshabilita el boton de submit**/
	else{
		searchUser.buscar.disabled = false;
	}
}
//Funcion que llama a cada una de las funciones de validacion de los campos del formulario SEARCH y les realiza una operacion AND y devuelve el resultado
function validarSearchUser(){
	return(comprobarTextoSinSearch(searchUser.login,searchUser.login.size) && 
	comprobarTextoSinSearch(searchUser.contrasena,searchUser.contrasena.size) && 
	comprobarTextoSinSearch(searchUser.email,searchUser.email.size) && 
	comprobarTextoSinSearch(searchUser.DNI, searchUser.DNI.size) &&
	comprobarTextoSearch(searchUser.direccion, searchUser.direccion.size) &&
	comprobarTextoSinSearch(searchUser.telefono, searchUser.telefono.size) && 
	comprobarAlfabeticoSearch(searchUser.nombre,searchUser.nombre.size) && 
	comprobarAlfabeticoSearch(searchUser.apellidos,searchUser.apellidos.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarAnadirGrupo(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDGrupo()){
		anadirGrupo.insertar.disabled = false;
	}/**Si la funcion validarModificacion() devuelve un false es que alguno de los campos del formulario
		esta mal cubierto entonces mantiene deshabilitado o si estaba habilitado se deshabilita el boton de submit**/
	else{
		anadirGrupo.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Grupo(devuelve un boolean)
function validarADDGrupo(){
	return(comprobarTexto(anadirGrupo.IdGrupo,anadirGrupo.IdGrupo.size) && 
		comprobarTexto(anadirGrupo.NombreGrupo, anadirGrupo.NombreGrupo.size) && 
		comprobarTexto(anadirGrupo.DescripGrupo,anadirGrupo.DescripGrupo.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarGrupo(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITGrupo()){
		editarGrupo.Editar.disabled = false;
	}/**Si la funcion validarModificacion() devuelve un false es que alguno de los campos del formulario
		esta mal cubierto entonces mantiene deshabilitado o si estaba habilitado se deshabilita el boton de submit**/
	else{
		editarGrupo.Editar.disabled = true;
	}
}
//Funcion que valida los datos del form de EDIT Grupo(devuelve un boolean)
function validarEDITGrupo(){
	return(comprobarTexto(editarGrupo.IdGrupo,editarGrupo.IdGrupo.size) && 
		comprobarTexto(editarGrupo.NombreGrupo, editarGrupo.NombreGrupo.size) && 
		comprobarTexto(editarGrupo.DescripGrupo,editarGrupo.DescripGrupo.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarGrupo(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarSEARCHGrupo()){
		buscarGrupo.buscar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarGrupo.buscar.disabled = true;
	}
}
//Funcion que valida los datos del form de SEARCH Grupo(devuelve un boolean)
function validarSEARCHGrupo(){
	return(comprobarTextoSinSearch(buscarGrupo.IdGrupo,buscarGrupo.IdGrupo.size) && 
		comprobarTextoSearch(buscarGrupo.NombreGrupo, buscarGrupo.NombreGrupo.size) && 
		comprobarTextoSearch(buscarGrupo.DescripGrupo,buscarGrupo.DescripGrupo.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarAnadirHistoria(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(comprobarTexto(anadirHistoria.IdHistoria, anadirHistoria.IdHistoria.size) && comprobarTexto(TextoHistoria,300)){
		anadirHistoria.insertar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirHistoria.insertar.disabled = true;
	}
	
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarHistoria(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(comprobarTextoSin(buscarHistoria.IdHistoria, buscarHistoria.IdHistoria.size) && comprobarTextoSearch(TextoHistoria,300)){
		buscarHistoria.buscar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarHistoria.buscar.disabled = true;
	}	
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarHistoria(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(comprobarTexto(TextoHistoria,300)){
		editarHistoria.editar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarHistoria.editar.disabled = true;
	}
}
//Validaciones de Trabajo
function validarAñadirTrabajo(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDTrabajo()){
		anadirTrabajo.insertar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirTrabajo.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Trabajo(devuelve un boolean)
function validarADDTrabajo(){
	return (comprobarTextoSin(anadirTrabajo.IdTrabajo, anadirTrabajo.IdTrabajo.size) &&
			comprobarTexto(anadirTrabajo.NombreTrabajo, anadirTrabajo.NombreTrabajo.size) &&
			comprobarFecha(anadirTrabajo.FechaIniTrabajo, anadirTrabajo.FechaIniTrabajo.size) &&
			comprobarFecha(anadirTrabajo.FechaFinTrabajo, anadirTrabajo.FechaFinTrabajo.size) &&
			comprobarEntero(anadirTrabajo.PorcentajeNota,0,100));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarTrabajo(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITTrabajo()){
		editarTrabajo.editar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarTrabajo.editar.disabled = true;
	}
}
//Funcion que valida los datos del form de EDIT Trabajo(devuelve un boolean)
function validarEDITTrabajo(){
	return (comprobarTextoSin(editarTrabajo.IdTrabajo, editarTrabajo.IdTrabajo.size) &&
			comprobarTexto(editarTrabajo.NombreTrabajo, editarTrabajo.NombreTrabajo.size) &&
			comprobarFecha(editarTrabajo.FechaIniTrabajo, editarTrabajo.FechaIniTrabajo.size) &&
			comprobarFecha(editarTrabajo.FechaFinTrabajo, editarTrabajo.FechaFinTrabajo.size) &&
			comprobarEntero(editarTrabajo.PorcentajeNota,0,100));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarTrabajo(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarSEARCHTrabajo()){
		buscarTrabajo.buscar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarTrabajo.buscar.disabled = true;
	}
}
//Funcion que valida los datos del form de SEARCH Trabajo(devuelve un boolean)
function validarSEARCHTrabajo(){
	return (comprobarTextoSinSearch(buscarTrabajo.IdTrabajo, buscarTrabajo.IdTrabajo.size) &&
			comprobarTextoSearch(buscarTrabajo.NombreTrabajo, buscarTrabajo.NombreTrabajo.size) &&
			comprobarTextoSinSearch(buscarTrabajo.FechaIniTrabajo, buscarTrabajo.FechaIniTrabajo.size) &&
			comprobarTextoSinSearch(buscarTrabajo.FechaFinTrabajo, buscarTrabajo.FechaFinTrabajo.size) &&
			comprobarTextoSinSearch(buscarTrabajo.PorcentajeNota,3));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarAnadirFuncionalidad(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDFunc()){
		anadirFunc.insertar.disabled = false;
	}//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirFunc.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Funcionalidad(devuelve un boolean)
function validarADDFunc(){
	return (comprobarTextoSin(anadirFunc.IdFuncionalidad, anadirFunc.IdFuncionalidad.size) &&
			comprobarTexto(anadirFunc.NombreFuncionalidad, anadirFunc.NombreFuncionalidad.size) &&
			comprobarTexto(anadirFunc.DescripFuncionalidad, anadirFunc.DescripFuncionalidad.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarFuncionalidad(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITFunc()){
		editarFuncionalidad.editar.disabled = false;
	}//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarFuncionalidad.editar.disabled = true;
	}
}
//Funcion que valida los datos del form de EDIT Funcionalidad(devuelve un boolean)
function validarEDITFunc(){
	return (comprobarTextoSin(editarFuncionalidad.IdFuncionalidad, editarFuncionalidad.IdFuncionalidad.size) &&
			comprobarTexto(editarFuncionalidad.NombreFuncionalidad, editarFuncionalidad.NombreFuncionalidad.size)&&
			comprobarTexto(editarFuncionalidad.DescripFuncionalidad, editarFuncionalidad.DescripFuncionalidad.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarFuncionalidad(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarSEARCHFunc()){
		buscarFuncionalidad.buscar.disabled = false;
	}//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarFuncionalidad.buscar.disabled = true;
	}
}
//Funcion que valida los datos del form de SEARCH Funcionalidad(devuelve un boolean)
function validarSEARCHFunc(){
	return (comprobarTextoSearch(buscarFuncionalidad.IdFuncionalidad, buscarFuncionalidad.IdFuncionalidad.size) &&
			comprobarTextoSearch(buscarFuncionalidad.NombreFuncionalidad, buscarFuncionalidad.NombreFuncionalidad.size)&&
			comprobarTextoSearch(buscarFuncionalidad.DescripFuncionalidad, 100));
}
//Validaciones de Accion
function validarAñadirAccion(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDAccion()){
		anadirAccion.insertar.disabled = false;
	}//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirAccion.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Accion(devuelve un boolean)
function validarADDAccion(){
	return (comprobarTexto(anadirAccion.IdAccion, anadirAccion.IdAccion.size) &&
			comprobarTexto(anadirAccion.NombreAccion, anadirAccion.NombreAccion.size)&&
			comprobarTexto(anadirAccion.DescripAccion, anadirAccion.DescripAccion.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarAccion(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITAccion()){
		editarAccion.editar.disabled = false;
	}//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarAccion.editar.disabled = true;
	}
}
//Funcion que valida los datos del form de EDIT Accion(devuelve un boolean)
function validarEDITAccion(){
	return (comprobarTexto(editarAccion.IdAccion, editarAccion.IdAccion.size) &&
			comprobarTexto(editarAccion.NombreAccion, editarAccion.NombreAccion.size)&&
			comprobarTexto(editarAccion.DescripAccion, editarAccion.DescripAccion.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarAccion(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarSEARCHAccion()){
		buscarAccion.buscar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarAccion.buscar.disabled = true;
	}
}
//Funcion que valida los datos del form de SEARCH Accion(devuelve un boolean)
function validarSEARCHAccion(){
	return (comprobarTextoSearch(buscarAccion.IdAccion, buscarAccion.IdAccion.size) &&
			comprobarTextoSearch(buscarAccion.NombreAccion, buscarAccion.NombreAccion.size)&&
			comprobarTextoSearch(buscarrAccion.DescripAccion, buscarAccion.DescripAccion.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarAnadirEvaluacion(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDEvaluacion()){
		anadirEvaluacion.insertar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirEvaluacion.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Evaluacion(devuelve un boolean)
function validarADDEvaluacion(){
	return (comprobarTextoSin(anadirEvaluacion.IdTrabajo, anadirEvaluacion.IdTrabajo.size) &&
			comprobarTextoSin(anadirEvaluacion.LoginEvaluador, anadirEvaluacion.LoginEvaluador.size)&&
			comprobarTexto(anadirEvaluacion.AliasEvaluado, anadirEvaluacion.AliasEvaluado.size)&&
			comprobarTexto(anadirEvaluacion.IdHistoria, anadirEvaluacion.IdHistoria.size)&&
			comprobarEntero(anadirEvaluacion.CorrectoA, 0,2)&&
			comprobarTexto(anadirEvaluacion.ComenIncorrectoA, 300)&&
			comprobarEntero(anadirEvaluacion.CorrectoP, 0,2)&&
			comprobarTexto(anadirEvaluacion.ComenIncorrectoP, 300)&&
			comprobarEntero(anadirEvaluacion.OK,0,2));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarEvaluacion(){
	//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITEvaluacion()){
		editarEvaluacion.editar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarEvaluacion.editar.disabled = true;
	}
}
//Funcion que valida los datos del form de EDIT Evaluacion(devuelve un boolean)
function validarEDITEvaluacion(){
	return (comprobarTextoSin(editarEvaluacion.IdTrabajo, editarEvaluacion.IdTrabajo.size) &&
			comprobarTextoSin(editarEvaluacion.LoginEvaluador, editarEvaluacion.LoginEvaluador.size)&&
			comprobarTexto(editarEvaluacion.AliasEvaluado, editarEvaluacion.AliasEvaluado.size)&&
			comprobarTexto(editarEvaluacion.IdHistoria, editarEvaluacion.IdHistoria.size)&&
			comprobarEntero(editarEvaluacion.CorrectoA, 0,2)&&
			comprobarTexto(editarEvaluacion.ComentIncorrectoA, 300)&&
			comprobarEntero(editarEvaluacion.CorrectoP, 0,2)&&
			comprobarTexto(editarEvaluacion.ComentIncorrectoP, 300)&&
			comprobarEntero(editarEvaluacion.OK,0,2));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarEvaluacion(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(!validarSEARCHEvaluacion()){
		buscarEvaluacion.buscar.disabled = true;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarEvaluacion.buscar.disabled = false;
	}
}
//Funcion que valida los datos del form de SEARCH Evaluacion(devuelve un boolean)
function validarSEARCHEvaluacion(){
	return (comprobarTextoSearch(buscarEvaluacion.IdTrabajo, buscarEvaluacion.IdTrabajo.size) &&
			comprobarTextoSinSearch(buscarEvaluacion.LoginEvaluador, buscarEvaluacion.LoginEvaluador.size)&&
			comprobarTextoSinSearch(buscarEvaluacion.AliasEvaluado, buscarEvaluacion.AliasEvaluado.size)&&
			comprobarTextoSearch(buscarEvaluacion.IdHistoria, buscarEvaluacion.IdHistoria.size)&&
			comprobarEnteroSearch(buscarEvaluacion.CorrectoA, 0,1)&&
			comprobarTextoSearch(buscarEvaluacion.ComenIncorrectoA, 300)&&
			comprobarEnteroSearch(buscarEvaluacion.CorrectoP, 0,1)&&
			comprobarTextoSearch(buscarEvaluacion.ComenIncorrectoP,300)&&
			comprobarEnteroSearch(buscarEvaluacion.OK, 0,1));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarAnadirNota(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDNota()){
		anadirNota.insertar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirNota.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Nota(devuelve un boolean)
function validarADDNota(){
	return (comprobarTexto(anadirNota.IdTrabajo, anadirNota.IdTrabajo.size) &&
			comprobarTexto(anadirNota.login, anadirNota.login.size)&&
			comprobarReal(anadirNota.NotaTrabajo,4,0,10));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarNota(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITNota()){
		editarNota.editar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarNota.editar.disabled = true;
	}
}
//Funcion que valida los datos del form de EDIT Nota(devuelve un boolean)
function validarEDITNota(){
	return (comprobarTexto(editarNota.IdTrabajo, editarNota.IdTrabajo.size) &&
			comprobarTexto(editarNota.login, editarNota.login.size)&&
			comprobarReal(editarNota.NotaTrabajo,4,0,10));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarNota(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarSEARCHNota()){
		buscarNota.buscar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarNota.buscar.disabled = true;
	}
}
//Funcion que valida los datos del form de SEARCH Nota(devuelve un boolean)
function validarSEARCHNota(){
	return (comprobarTextoSearch(buscarNota.IdTrabajo, buscarNota.IdTrabajo.size) &&
			comprobarTextoSearch(buscarNota.login, buscarNota.login.size)&&
			comprobarReal(buscarNota.NotaTrabajo,2,0,10));
}

//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarAnadirAsignQA(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDAsignQA()){
		anadirAsignQA.insertar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirAsignQA.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD AsignQA(devuelve un boolean)
function validarADDAsignQA(){
	return (comprobarTextoSin(anadirAsignQA.IdTrabajo, anadirAsignQA.IdTrabajo.size) &&
			comprobarTextoSin(anadirAsignQA.LoginEvaluador, anadirAsignQA.LoginEvaluador.size)&&
			comprobarTextoSin(anadirAsignQA.LoginEvaluado, anadirAsignQA.LoginEvaluado.size)&&
			comprobarTextoSin(anadirAsignQA.AliasEvaluado, anadirAsignQA.AliasEvaluado.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarAsignQA(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITAsignQA()){
		editarAsignQA.editar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarAsignQA.editar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Nota(devuelve un boolean)
function validarEDITAsignQA(){
	return (comprobarTextoSin(editarAsignQA.IdTrabajo, editarAsignQA.IdTrabajo.size) &&
			comprobarTextoSin(editarAsignQA.LoginEvaluador, editarAsignQA.LoginEvaluador.size)&&
			comprobarTextoSin(editarAsignQA.LoginEvaluado, editarAsignQA.LoginEvaluado.size)&&
			comprobarTextoSin(editarAsignQA.AliasEvaluado, editarAsignQA.AliasEvaluado.size));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarAsignQA(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarSEARCHAsignQA()){
		buscarAsignQA.buscar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarAsignQA.buscar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Nota(devuelve un boolean)
function validarSEARCHAsignQA(){
	return (comprobarTextoSinSearch(buscarAsignQA.IdTrabajo, buscarAsignQA.IdTrabajo.size) &&
			comprobarTextoSinSearch(buscarAsignQA.LoginEvaluador, buscarAsignQA.LoginEvaluador.size)&&
			comprobarTextoSinSearch(buscarAsignQA.LoginEvaluado, buscarAsignQA.LoginEvaluado.size)&&
			comprobarTextoSinSearch(buscarAsignQA.AliasEvaluado, buscarAsignQA.AliasEvaluado.size));
}

//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarAnadirEntrega(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarADDEntrega()){
		anadirEntrega.insertar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		anadirEntrega.insertar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Entrega(devuelve un boolean)
function validarADDEntrega(){
	return (comprobarTexto(anadirEntrega.login, anadirEntrega.login.size) &&
			comprobarTexto(anadirEntrega.IdTrabajo, anadirEntrega.IdTrabajo.size)&&
			comprobarTexto(anadirEntrega.Alias, anadirEntrega.Alias.size)&&
			comprobarEntero(anadirEntrega.Horas,0,99)&&
			comprobarTexto(anadirEntrega.Ruta, anadirEntrega.Ruta.size));
}

//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarEditarEntrega(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarEDITEntrega()){
		editarEntrega.editar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		editarEntrega.editar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Entrega(devuelve un boolean)
function validarEDITEntrega(){
	return (comprobarTexto(editarEntrega.login, editarEntrega.login.size) &&
			comprobarTexto(editarEntrega.IdTrabajo, editarEntrega.IdTrabajo.size)&&
			comprobarTexto(editarEntrega.Alias, editarEntrega.Alias.size)&&
			comprobarEntero(editarEntrega.Horas,0,99));
}
//Funcion que habilita/deshabilita el boton del form segun la validez de los datos introducidos
function validarBuscarEntrega(){
//Si los datos introducidos son correctos en la funcion de validar habilitamos el boton
	if(validarSEARCHEntrega()){
		buscarEntrega.buscar.disabled = false;
	}
	//Si los datos introducidos son incorrectos en la funcion de validar deshabilitamos el boton
	else{
		buscarEntrega.buscar.disabled = true;
	}
}
//Funcion que valida los datos del form de ADD Entrega(devuelve un boolean)
function validarSEARCHEntrega(){
	return (comprobarTextoSinSearch(buscarEntrega.login, buscarEntrega.login.size) &&
			comprobarTextoSinSearch(buscarEntrega.IdTrabajo, buscarEntrega.IdTrabajo.size)&&
			comprobarTextoSinSearch(buscarEntrega.Alias, buscarEntrega.Alias.size)&&
			comprobarEnteroSearch(buscarEntrega.Horas,0,99));
}

