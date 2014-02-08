<?php
// Conexión a la Base de Datos
include '../scripts/conexion.php'; 
// Valores de Formulario mediante POST e ID del Campo
$nombre_operador = $_POST['nombre_operador'];
$cargo = $_POST['cargo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
//Establece Zona Horaria Predeterminada
date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
$fecha=date("Y-m-d");
$hora=date("H:i:s");
// Insertar Valores en la Tabla Especificada
$insertar = mysql_query("INSERT INTO tc_operadores (nombre_operador, fecha_alta, hora_alta, cargo, usuario, password)
						VALUES ('{$nombre_operador}', '{$fecha}','{$hora}','{$cargo}','{$usuario}','{$password}')", $conexion);
		if (!$insertar) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
// Redirección de la Página
		header('Location: ../operadores.php');
// Cierre de la Conexion con la Base de Datos
	mysql_close($conexion);
?>