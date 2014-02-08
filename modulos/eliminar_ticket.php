<?php include '../scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario
$id_ticket = $_POST['id_ticket'];
// Borramos valores en la Tabla Especificada
$borrar = mysql_query("DELETE FROM tm_ticket WHERE id_ticket='$id_ticket'", $conexion);
		if (!$borrar) {
			die("Fallo la eliminacion del registro en la Base de Datos: " . mysql_error());
			}
// Mostrar mensaje de confirmacion
		header('Location: ../tickets.php');
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
?>