<?php include '../scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario
$marca = $_POST['marca'];
// Borramos valores en la Tabla Especificada
$borrar = mysql_query("DELETE FROM tc_marca WHERE nombre='$marca'", $conexion);
		if (!$borrar) {
			die("Fallo la eliminacion del registro en la Base de Datos: " . mysql_error());
			}
// Mostrar mensaje de confirmacion
		header('Location: ../catalogos.php');
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
?>