<?php include '../scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario
$id_empresa = $_POST['id_empresa'];
$nombre_empresa = $_POST['nombre_empresa'];
$titular = $_POST['titular'];
$direccion = $_POST['direccion'];
$direccion_colonia = $_POST['direccion_colonia'];
$direccion_ciudad = $_POST['direccion_ciudad'];
$direccion_estado = $_POST['direccion_estado'];
$telefono = $_POST['telefono'];
$codigo_postal = $_POST['codigo_postal'];
$rfc = $_POST['rfc'];
$mail = $_POST['mail'];
$leyenda = $_POST['leyenda'];
// Actualizar la Tabla con los Valores Nuevos
$actualizar = mysql_query("
UPDATE tm_empresa SET nombre='$nombre_empresa', titular= '$titular', direccion='$direccion', direccion_colonia= '$direccion_colonia', direccion_ciudad= '$direccion_ciudad', direccion_estado= '$direccion_estado', telefono= '$telefono', codigo_postal= '$codigo_postal', rfc= '$rfc', mail= '$mail', leyenda= '$leyenda' WHERE id_empresa= '$id_empresa'", $conexion);
		if (!$actualizar) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
// Mostrar mensaje de confirmacion
		header('Location: ../principal_main.php');
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
?>