<link rel="stylesheet" href="../css/css.css" type="text/css">
<?php include '../scripts/conexion.php'; ?>
<?php
// Obteniendo Valores del Formulario y Almacenando en Variables
$operador = $_POST['operador'];
$placas_1 = $_POST['placas_1'];
$placas_2 = $_POST['placas_2'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$engomado = $_POST['engomado'];
$tipo_calcomania = $_POST['tipo_calcomania'];
$forma_pago = $_POST['forma_pago'];
$referencia = $_POST['referencia'];
$nombre = $_POST['nombre_cliente'];
$mail_cliente = $_POST['mail_cliente'];
// Obteniendo Información de la Empresa y Almacenando en Variables
$empresa = "SELECT * FROM tm_empresa";
$info=mysql_query($empresa, $conexion) or die(mysql_error());
$infoarray=mysql_fetch_object($info);
$nombre_empresa= $infoarray->nombre;
$direccion = $infoarray->direccion;
$colonia = $infoarray->direccion_colonia;
$codigo_postal = $infoarray->codigo_postal;
$rfc = $infoarray->rfc;
$leyenda = $infoarray->leyenda;
$telefono = $infoarray->telefono;
$mail = $infoarray->mail;
// Unificando Placas del Vehiculo en Variable
$placas = $placas_1 . "-" . $placas_2;
// Obteniendo Existencia Actual de Calcomania y Condicionando el Proceso
$consulta_existencia=mysql_query("SELECT existencia FROM tc_calcomanias WHERE nombre='$tipo_calcomania'", $conexion);
$array_existencia=mysql_fetch_array($consulta_existencia, MYSQL_ASSOC);
$existencia_actual=$array_existencia['existencia'];
if ($existencia_actual == 0)
	{
		echo "<script language='javascript'>window.location='existencia_insuficiente.php'</script>";
		exit();
	}
// Establece Zona Horaria Predeterminada y Asigna Valores a Variables de Fecha y Hora
date_default_timezone_set('America/Mexico_City');
$fecha=date("Y-m-d");
$hora=date("H:i:s");
// Calculo y Actualización de Existencia
$existencia_final = $existencia_actual - 1;
$nueva_existencia = mysql_query("UPDATE tc_calcomanias SET existencia='$existencia_final' WHERE nombre='$tipo_calcomania'", $conexion);
// Consulta el Costo de la Calcomania
$consulta_total=mysql_query("SELECT costo FROM tc_calcomanias WHERE nombre='$tipo_calcomania'", $conexion);
$array_total=mysql_fetch_array($consulta_total, MYSQL_ASSOC);
// Condicionar antes de Insertar Información
if (isset($_POST['cortesia_check'])) {
$total = "00";
$tipo_calcomania = "Cortesía " . $tipo_calcomania;
}
else
{
$total = $array_total['costo'];
}
// Insertar en la Tabla con los Valores Nuevos
$nuevo_ticket = mysql_query("
INSERT INTO tm_ticket (fecha, hora, nombre_operador, placas_vehiculo, marca_vehiculo, modelo_vehiculo, concepto, forma_pago, referencia, total)
VALUES ('{$fecha}', '{$hora}', '{$operador}', '{$placas}', '{$marca}', '{$modelo}', '{$tipo_calcomania}', '{$forma_pago}', '{$referencia}', '{$total}')", $conexion);
		if (!$nuevo_ticket) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
$nuevo_cliente = mysql_query("
INSERT INTO tm_clientes (nombre, mail, placas_vehiculo, marca_vehiculo, modelo_vehiculo, engomado_vehiculo, fecha, hora)
VALUES ('{$nombre}', '{$mail_cliente}', '{$placas}', '{$marca}', '{$modelo}', '{$engomado}', '{$fecha}', '{$hora}')", $conexion);
		if (!$nuevo_cliente) {
			die("Fallo en la insercion de registro en la Base de Datos: " . mysql_error());
			}
// Obtenemos el ID del Ticket para Referencia
$ticket_referencia = mysql_query("SELECT MAX(id_ticket) AS ticket_id FROM tm_ticket");
if ($fila = mysql_fetch_row($ticket_referencia)) {
$ticket_id = trim($fila[0]);
}
// Mostrar Ticket para Impresión
echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Ticket</title>
<link rel="stylesheet" href="../css/css.css" type="text/css">
</head>

<body onload="window.print()">

<div id="ticket" name="ticket">
<table width="300" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="font-grande">'.$nombre_empresa.'</td>
  </tr>
  <tr>
    <td align="center"><span class="font-pequeña">'.$direccion.', '.$colonia.', Cuautitlán Izcalli, Estado de México, México.</span></td>
  </tr>
  <tr>
    <td align="center"><span class="font-pequeña">Código Postal: '.$codigo_postal.', RFC: '.$rfc.'</span></td>
  </tr>
  <tr>
    <td align="center" class="font-grande">Caja</td>
  </tr>
  <tr>
    <td align="center"><span class="font-pequeña">Comprobante de Pago: <b>'.$ticket_id.'</b></span></td>
  </tr>
  <tr>
    <td align="center"><span class="font-pequeña">Le Atendió: '.$operador.'</span></td>
  </tr>
  <tr>
    <td align="center"><span class="font-pequeña">Fecha: '.$fecha.' '.$hora.'</span></td>
  </tr>
  <tr>
    <td align="center" class="font-details-min">&nbsp;</td>
  </tr>
  <tr>
    <td>Información del Vehículo</td>
  </tr>
  <tr>
    <td><hr style="color:#333;"></td>
  </tr>
  <tr>
    <td align="center" class="font-grande">'.$placas.'</td>
  </tr>
  <tr>
    <td><span class="font-pequeña">Marca: '.$marca.'</span></td>
  </tr>
  <tr>
    <td><span class="font-pequeña">Modelo: '.$modelo.'</span></td>
  </tr>
  <tr>
    <td><span class="font-pequeña">Engomado: '.$engomado.'</span></td>
  </tr>
  <tr>
    <td><span class="font-pequeña">Propietario: '.$nombre.'</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Información de Pago</td>
  </tr>
  <tr>
    <td><hr style="color:#333;"></td>
  </tr>
  <tr>
    <td align="center">'.$tipo_calcomania.'</td>
  </tr>
  <tr>
    <td><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr class="font-details-min">
        <td width="165" class="font-pequeña">Concepto</td>
        <td width="115" class="font-pequeña">Costo</td>
      </tr>
      <tr>
        <td colspan="2"><hr style="color:#333;"></td>
        </tr>
      <tr>
        <td><span class="font-pequeña">Verificación '.$tipo_calcomania.'</span></td>
        <td width="115"><span class="font-pequeña">$'.$total.'.00 m.n.</span></td>
        </tr>
      <tr>
        <td align="right"><span class="font-pequeña"><strong>Total:</strong></span></td>
        <td width="115"><span class="font-pequeña"><strong>$'.$total.'.00 m.n.</strong></span></td>
      </tr>
      <tr>
        <td colspan="2"><span class="font-pequeña">Forma de Pago: '.$forma_pago.'</span></td>
      </tr>
      <tr>
        <td colspan="2" class="font-pequeña">Número de Referencia: '.$referencia.'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><span class="font-pequeña"><br>
    '.$leyenda.'</span></td>
  </tr>
  <tr>
    <td align="center"><span class="font-pequeña">Teléfono: '.$telefono.'<br>Correo Electrónico: '.$mail.'</span></td>
  </tr>
</table>
</div>
</body>
</html>
	';
// Cerramos la Conexion con la Base de Datos
	mysql_close($conexion);
?>