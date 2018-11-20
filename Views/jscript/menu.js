/**Funcion para abrir y cerrar los submenus del menu lateral*/
//Partimos de un menu y unos submenus ya hecho en el html. Al arrancar la pagina aparecen todos los submenus cerrados.
function abrirMenu(submenu,nMenus){
	//Si el submenu esta abierto y clickamos haremos que se cierre
	if(document.getElementById(submenu).style.display == "block"){
		//Cerrar menu es lo mismo que "ocultarlo" con css
		document.getElementById(submenu).style.display = "none";
	}
	//Si el submenu esta cerrado y clickamos haremos que cierre el resto y abra el que hemos clickado
	else{
		//Llamamos a la funcion que cierra el resto de los submenus
		cerrarMenus(nMenus);
		//Abrir menu es lo mismo que "mostrarlo" con css
		document.getElementById(submenu).style.display = "block";
	}
}
/**Funcion para cerrar submenus.Esta funcion sirve para el control de que cuando quieres abrir un submenu teniendo otro abierto cierre este**/
function cerrarMenus(num){
	//En la variable menu almacenaremos en las sucesivas iteracciones del bucle el id 
	//de cada uno de los submenus y lo "cerraremos"
	var menu = "";
	//Realizamos un bucle for recorriendo los submenus que tengas en nuestra web
	//Obtenemos el id del submenu y lo ocultamos con css
	for(var i=1;i<=num;i++){
		menu= "submenu"+i.toString();
		document.getElementById(menu).style.display= "none";
	}
}