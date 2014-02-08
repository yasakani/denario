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
$ticket_num=$_POST['ticket_num'];
// Verificamos que no este Vacio
if ($ticket_num=="")
{	exit();
}
// Se realiza la Consulta del Producto
$ticket=mysql_query("SELECT * FROM tm_ticket WHERE id_ticket='".$ticket_num."'",$conexion);
$fila = mysql_fetch_array($ticket);
// Comparamaos que el ID se encuentre en la Base de Datos
$identificador= $fila['id_ticket'];
if ($ticket_num==$identificador){}
else {
echo "<br/><b><span class='font-little-blue'><i>No existen Tickets correspondientes al Número ingresado.</span></i></b><br/>El Número de Ticket se encuentra en la lista posterior o puede ser consultado en el Comprobante Impreso generado al Efectuar un Cobro.<br/><br/>";
exit();
}
// Se muestra la informacion Resultante
echo "<br/><b><u>Información del Ticket</u></b><br/>";
echo "<b>ID/Número:</b> ".$fila['id_ticket']."<br/>";
echo "<b>Fecha:</b> " .$fila['fecha'] .$fila['hora']."<br/>";
echo "<b>Operador:</b> ".$fila['nombre_operador']."<br/>";
echo "<b>Placas:</b> ".$fila['placas_vehiculo']."<br/>";
echo "<b>Concepto:</b> ".$fila['concepto']."<br/>";
echo "<b>Forma de Pago:</b> ".$fila['forma_pago']."<br/>";
echo "<b>Total:</b> $".$fila['total'].".00 m.n.";
?>