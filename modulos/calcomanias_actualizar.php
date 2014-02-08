<?php include '../scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario
$id_00 = $_POST['id_00'];
$costo_00 = $_POST['costo_00'];
$existencia_00 = $_POST['existencia_00'];
$id_0 = $_POST['id_0'];
$costo_0 = $_POST['costo_0'];
$existencia_0 = $_POST['existencia_0'];
$id_2 = $_POST['id_2'];
$costo_2 = $_POST['costo_2'];
$existencia_2 = $_POST['existencia_2'];
// Actualizar la Tabla con los Valores Nuevos
$actualizar00 = mysql_query("
UPDATE tc_calcomanias SET costo='$costo_00', existencia='$existencia_00' WHERE id_calcomania= '$id_00'", $conexion);
		if (!$actualizar00) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
// Actualizar la Tabla con los Valores Nuevos
$actualizar0 = mysql_query("
UPDATE tc_calcomanias SET costo='$costo_0', existencia='$existencia_0' WHERE id_calcomania= '$id_0'", $conexion);
		if (!$actualizar0) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
// Actualizar la Tabla con los Valores Nuevos
$actualizar2 = mysql_query("
UPDATE tc_calcomanias SET costo='$costo_2', existencia='$existencia_2' WHERE id_calcomania= '$id_2'", $conexion);
		if (!$actualizar2) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
// Mostrar mensaje de confirmacion
		header('Location: ../principal_main.php');
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
	?>