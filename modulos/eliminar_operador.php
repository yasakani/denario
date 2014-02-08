<?php include '../scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario
$id_operador = $_POST['id_operador'];
// Borramos valores en la Tabla Especificada
$borrar = mysql_query("DELETE FROM tc_operadores WHERE id_operador='$id_operador'", $conexion);
		if (!$borrar) {
			die("Fallo la eliminacion del registro en la Base de Datos: " . mysql_error());
			}
// Mostrar mensaje de confirmacion
		header('Location: ../operadores.php');
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
?>