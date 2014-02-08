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
// Obtener valor del ID del Producto
$placas_vehiculo=$_POST['placas_vehiculo'];
// Verificamos que no este Vacio
if ($placas_vehiculo=="")
{	exit();
}
// Se realiza la Consulta del Producto
$cliente=mysql_query("SELECT * FROM tm_clientes WHERE placas_vehiculo='".$placas_vehiculo."'",$conexion);
$fila = mysql_fetch_array($cliente);
// Comparamaos que el ID del Producto se encuentre en la Base de Datos
$identificador= $fila['placas_vehiculo'];
if ($placas_vehiculo==$identificador){}
else {
echo "<br/><b>No existen Clientes correspondientes a las Placas ingresadas</b><br/>Ingrese las placas del vehiculo del Cliente con el formato completo.<br/><i><span class='font-little-blue'>Ejemplo: LZF-7145</span></i><br/><br/>";
exit();
}
// Se muestra la informacion Resultante
echo "<br/><b><u>Información del Cliente</u></b><br/>";
echo "<b>Nombre:</b> ".$fila['nombre']."<br/>";
echo "<b>Mail:</b> ".$fila['mail']."<br/>";
echo "<b>Marca del Vehiculo:</b> ".$fila['marca_vehiculo']."<br/>";
echo "<b>Modelo del Vehiculo:</b> ".$fila['modelo_vehiculo']."<br/>";
echo "<b>Placas:</b> ".$fila['placas_vehiculo']."<br/>";
echo "<b>Engomado:</b> ".$fila['engomado_vehiculo']."<br/>";
echo "<b>Fecha de Alta:</b> ".$fila['fecha']." ".$fila['hora']."<br/><br/>";
?>