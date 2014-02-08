<?php include '../scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario
$id_cliente = $_POST['id_cliente'];
// Borramos valores en la Tabla Especificada
$borrar = mysql_query("DELETE FROM tm_clientes WHERE id_cliente='$id_cliente'", $conexion);
		if (!$borrar) {
			die("Fallo la eliminacion del registro en la Base de Datos: " . mysql_error());
			}
// Mostrar mensaje de confirmacion
		header('Location: ../clientes.php');
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
?>