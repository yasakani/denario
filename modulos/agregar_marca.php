<?php include '../scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario
$nombre_marca = $_POST['nombre_marca'];
// Insertar valores en la Tabla Especificada
$insertar = mysql_query("INSERT INTO tc_marca (nombre)
						VALUES ('{$nombre_marca}')", $conexion);
		if (!$insertar) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
// Mostrar mensaje de confirmacion
		header('Location: ../catalogos.php');
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
?>