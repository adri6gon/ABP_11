<!--
Funcion del archivo: Archivo que borra la sesion iniciada.
Autor: j0z5zs
Fecha: 23/12/17
-->
<?php

session_start();
session_destroy();
header('Location:../index.php');

?>
