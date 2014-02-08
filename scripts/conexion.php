<?php
// Se Establece Conexion con la Base de Datos
$conexion = mysql_connect('localhost', 'root', '');
// Si falla la Conexion se muestra Mensaje de Error
if (!$conexion) {
    die('Error al conectar con la Base de Datos: ' . mysql_error());
	}
// Seleccion de la Base de Datos
$bdatos = mysql_select_db ('denario', $conexion);
if (!$bdatos) {
// Si falla la Conexion se muestra Mensaje de Error
    die ('Error al seleccionar la Base de Datos: ' . mysql_error());
}
?>