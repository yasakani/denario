<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Reportes : Reporte por Día</title>
<link rel="stylesheet" href="../css/css.css" type="text/css">
<?php include '../scripts/conexion.php'; ?>
<script language="javascript">
function ImprimeDiv()
{
var divToPrint=document.getElementById('content');
var newWin=window.open('','Print-Window', 'width=800 height=650');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
setTimeout(function(){newWin.close();},10);
}
</script>
<script language="javascript"> 
function color_over(fila){ fila.style.backgroundColor="#BDD5FF"}  
function color_out(fila){ fila.style.backgroundColor=""}
</script>
<?php
//Obtener valores del Formulario de Login
$anio = $_POST['año']; 
$mes = $_POST['mes'];
$dia = $_POST['dia'];
//Unificamos en una Variable
$fecha_consultar = $anio . "-" . $mes . "-" . $dia;
// Comparacion de Valores del Login
$reporte_x_dia = "SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar'";
$acceso=mysql_query($reporte_x_dia, $conexion) or die(mysql_error());
if (mysql_num_rows($acceso)==0){
echo "<script language='javascript'>window.location='../reportes.php'</script>";
	die();
}
//Establece Zona Horaria Predeterminada
date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
$fecha_dia=date("Y-m-d");
$fecha_hora=date("H:i:s");
?>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-image:url(../imagenes/bg-login.png); background-position:top center; background-repeat:repeat-x; background-attachment:fixed;"><table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="180" align="center"><img src="../imagenes/logo-principal-min.png" width="120" height="58" title="Denario"/></td>
        <td width="600" align="right"> <img src="../imagenes/user-miniicon.png" width="18" height="18" /> Bienvenido!  (<a href="../index.php" class="link">Cerrar Sesión</a>)<br/></td>
      </tr>
      </table>
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><a href="../principal_main.php"><img src="../imagenes/principal-menu.png" width="97" height="53" /></a><a href="../empresa.php"><img src="../imagenes/empresa-menu.png" width="97" height="53" /></a><a href="../operadores.php"><img src="../imagenes/operadores-menu.png" width="97" height="53" /></a><a href="../calcomanias.php"><img src="../imagenes/calcomanias-menu.png" width="97" height="53" /></a><a href="../catalogos.php"><img src="../imagenes/catalogos-menu.png" width="97" height="53" /></a><a href="../clientes.php"><img src="../imagenes/clientes-menu.png" width="97" height="53" /></a><a href="../tickets.php"><img src="../imagenes/tickets-menu.png" width="97" height="53" /></a><a href="../reportes.php"><img src="../imagenes/menu-clean-close.png" width="97" height="53" /></a></td>
        </tr>
      </table>
      <br />
      <br />
      <br />
    <br />
    <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="../imagenes/bg-top.png" width="780" height="10" /></td>
      </tr>
      <tr>
        <td style="background-image:url(../imagenes/bg-content.png); background-repeat:repeat-y;"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50"><img src="../imagenes/stats-producto.png" width="47" height="47" /></td>
            <td width="470"><span class="font-title-secciones"><strong>Reportes</strong></span><br/>
              <span class="font-descri-secciones">Generación de Reportes Diarios y por Periodo. Consulta de Históricos y detalle de Ingresos.</span></td>
            <td width="230" align="right"><a href="javascript:ImprimeDiv()" class="link"><img src="../imagenes/printer-icon.png" width="18" height="18" /> Imprimir Reporte</a></td>
            </tr>
        </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="../imagenes/linea.png" width="750" height="1" /></td>
            </tr>
        </table>
          <br />
          <div id="content">
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><span class="font-title-secciones">Reporte del Día</span><br />
                <span class="font-stats-grey"><?php echo $fecha_consultar; ?></span><br/>
                Reporte Generado el <?php echo $fecha_dia; ?> a las <?php echo $fecha_hora; ?> hrs.</td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><span class="font-title">Información General</span></td>
              </tr>
            <tr>
              <td style="padding-top:10px;"><img src="../imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><span class="font-details">Ingreso del Día</span><span class="font-stats-green"><br />
                $<?php
             $recaudacion_dia=mysql_query("SELECT SUM(total) AS total FROM tm_ticket WHERE fecha='$fecha_consultar'");
			 $fila=mysql_fetch_array($recaudacion_dia, MYSQL_ASSOC);
			 echo $fila["total"];
			 ?>.00 m.n.</span></td>
            </tr>
</table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="font-little-blue">
              <td align="center">Número de Clientes Atendidos</td>
              <td align="center">Número de Tickets Expedidos</td>
            </tr>
            <tr>
              <td align="center"><span class="font-stats-grey">
                <?php
            $clientes_atendidos=mysql_query("SELECT * FROM tm_clientes WHERE fecha='$fecha_consultar'",$conexion);
			$numero_clientes=mysql_num_rows($clientes_atendidos);
			if ($numero_clientes==0){
				echo '0';}
				else {
					echo $numero_clientes;
				}
			 ?>
              </span></td>
              <td align="center"><span class="font-stats-grey">
                <?php
            $tickets_expedidos=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar'",$conexion);
			$numero_tickets=mysql_num_rows($tickets_expedidos);
			if ($numero_tickets==0){
				echo '0';}
				else {
					echo $numero_tickets;
				}
			 ?>
              </span></td>
            </tr>
            <tr>
              <td align="center" class="font-little-blue">Calcomanías Cobradas del Día</td>
              <td align="center" class="font-little-blue">Cortesías Generadas del Día</td>
              </tr>
            <tr>
              <td align="center" class="font-stats-grey">
              	<?php
				// Obteniendo Número de Calcomanias del Día Tipo 00
				$num_calc_00_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 00'",$conexion);
				$numero_calc_00_dia=mysql_num_rows($num_calc_00_dia);
				// Obteniendo Número de Calcomanias del Día Tipo 0
				$num_calc_0_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 0'",$conexion);
				$numero_calc_0_dia=mysql_num_rows($num_calc_0_dia);
				// Obteniendo Número de Calcomanias del Día Tipo 2
				$num_calc_2_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 2'",$conexion);
				$numero_calc_2_dia=mysql_num_rows($num_calc_2_dia);
				// Obteniendo el Número Total de Calcomanias
				$num_calc_dia = $numero_calc_00_dia + $numero_calc_0_dia + $numero_calc_2_dia;
				if ($num_calc_dia==0){
				echo '0';}
				else {
					echo $num_calc_dia;
				}
			 	?>
              <td align="center" class="font-stats-grey">
              	<?php
			// Obteniendo Número de Cortesias Tipo 0
			$num_cort_0=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Cortesía Tipo 0'",$conexion);
			$numero_cort_0=mysql_num_rows($num_cort_0);
			// Obteniendo Número de Cortesias Tipo 00
			$num_cort_00=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Cortesía Tipo 00'",$conexion);
			$numero_cort_00=mysql_num_rows($num_cort_00);
			// Obteniendo Número de Cortesias Tipo 2
			$num_cort_2=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Cortesía Tipo 2'",$conexion);
			$numero_cort_2=mysql_num_rows($num_cort_2);
			// Número Total de Cortesias del Día
			$numero_total_dia_cortesias = $numero_cort_0 + $numero_cort_00 + $numero_cort_2;
			if ($numero_total_dia_cortesias==0){
				echo '0';}
				else {
					echo $numero_total_dia_cortesias;
				}
			 ?>
              </td>
              </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="210"><span class="font-title">Calcomanías</span></td>
              <td width="540">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" style="padding-top:10px;"><img src="../imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="font-little-blue">
              <td width="295" align="center" class="font-little-blue">Tipo 00</td>
              <td width="196" align="center" class="font-little-blue">Tipo 0</td>
              <td width="259" align="center" class="font-little-blue">Tipo 2</td>
            </tr>
            <tr>
              <td width="295" align="center" class="font-stats-grey">
                <?php
            $num_calc_00=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 00'",$conexion);
			$numero_calc_00=mysql_num_rows($num_calc_00);
			if ($numero_calc_00==0){
				echo '0';}
				else {
					echo $numero_calc_00;
				}
			 ?>
                <br /></td>
              <td width="196" align="center"><span class="font-stats-grey">
                <?php
            $num_calc_0=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 0'",$conexion);
			$numero_calc_0=mysql_num_rows($num_calc_0);
			if ($numero_calc_0==0){
				echo '0';}
				else {
					echo $numero_calc_0;
				}
			 ?>
                <br />
              </span></td>
              <td align="center"><span class="font-stats-grey">
                <?php
            $num_calc_2=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 2'",$conexion);
			$numero_calc_2=mysql_num_rows($num_calc_2);
			if ($numero_calc_2==0){
				echo '0';}
				else {
					echo $numero_calc_2;
				}
			 ?>
                <br />
              </span></td>
            </tr>
            <tr class="font-title-secciones">
              <td align="center" class="font-title-money">$<?php
             $total_calc_00=mysql_query("SELECT SUM(total) AS total_calc_00 FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 00'");
			 $fila_calc_00=mysql_fetch_array($total_calc_00, MYSQL_ASSOC);
			 echo $fila_calc_00["total_calc_00"];
			 ?>
.00 m.n.</td>
              <td width="196" align="center"><span class="font-title-money">$<?php
             $total_calc_0=mysql_query("SELECT SUM(total) AS total_calc_0 FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 0'");
			 $fila_calc_0=mysql_fetch_array($total_calc_0, MYSQL_ASSOC);
			 echo $fila_calc_0["total_calc_0"];
			 ?>
.00 m.n.</span></td>
              <td align="center"><span class="font-title-money">$<?php
             $total_calc_2=mysql_query("SELECT SUM(total) AS total_calc_2 FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Tipo 2'");
			 $fila_calc_2=mysql_fetch_array($total_calc_2, MYSQL_ASSOC);
			 echo $fila_calc_2["total_calc_2"];
			 ?>
.00 m.n.</span></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="210"><span class="font-title">Cortesías</span></td>
              <td width="540">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" style="padding-top:10px;"><img src="../imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="font-little-blue">
              <td width="295" align="center" class="font-little-blue">Tipo 00</td>
              <td width="196" align="center" class="font-little-blue">Tipo 0</td>
              <td width="259" align="center" class="font-little-blue">Tipo 2</td>
            </tr>
            <tr>
              <td width="295" align="center" class="font-stats-grey"><?php
            $num_calc_00=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Cortesía Tipo 00'",$conexion);
			$numero_calc_00=mysql_num_rows($num_calc_00);
			if ($numero_calc_00==0){
				echo '0';}
				else {
					echo $numero_calc_00;
				}
			 ?>
                <br /></td>
              <td width="196" align="center"><span class="font-stats-grey">
                <?php
            $num_calc_0=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Cortesía Tipo 0'",$conexion);
			$numero_calc_0=mysql_num_rows($num_calc_0);
			if ($numero_calc_0==0){
				echo '0';}
				else {
					echo $numero_calc_0;
				}
			 ?>
                <br />
              </span></td>
              <td align="center"><span class="font-stats-grey">
                <?php
            $num_calc_2=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar' AND concepto='Cortesía Tipo 2'",$conexion);
			$numero_calc_2=mysql_num_rows($num_calc_2);
			if ($numero_calc_2==0){
				echo '0';}
				else {
					echo $numero_calc_2;
				}
			 ?>
                <br />
              </span></td>
            </tr>
          </table>
          <br />
		<div id="tickets" name="tickets">
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><span class="font-title">Tickets</span></td>
              </tr>
            <tr>
              <td style="padding-top:10px;"><img src="../imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="font-little-blue">
              <td width="65">Número</td>
              <td width="113">Fecha</td>
              <td width="196">Operador</td>
              <td width="98">Placas</td>
              <td width="99">Concepto</td>
              <td width="118">Forma de Pago</td>
              <td width="81">Total</td>
            </tr>
            <?php
//Consulta para Obtener Productos
$tickets=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_consultar'",$conexion);
//Creamos un Arreglo que recorra Fila por Fila
while($fila=mysql_fetch_array($tickets)){
//Creamos y Vaciamos informacion en la fila	
	?>
            <tr onmouseover="color_over(this)" onmouseout="color_out(this)">
              <td><?php echo $fila['id_ticket']; ?></td>
              <td><?php echo $fila['fecha']; ?> <?php echo $fila['hora']; ?></td>
              <td><?php echo $fila['nombre_operador']; ?></td>
              <td><?php echo $fila['placas_vehiculo']; ?></td>
              <td><?php echo $fila['concepto']; ?></td>
              <td><?php echo $fila['forma_pago']; ?></td>
              <td>$<?php echo $fila['total']; ?>.00 m.n.</td>
            </tr>
            <?php 
  //Finalizamos el Arreglo
  }
   ?>
          </table>
          </div>
          <br />
          <br />
          <div id="clientes" name="clientes">
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="750"><span class="font-title">Clientes</span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="../imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="font-little-blue">
              <td width="35">ID</td>
              <td width="265">Nombre</td>
              <td width="95">Engomado</td>
              <td width="115">Marca</td>
              <td width="70">Modelo</td>
              <td width="70">Placas</td>
              <td width="120">Fecha de Alta</td>
            </tr>
            <?php 
//Consulta para Obtener Productos
$clientes=mysql_query("SELECT * FROM tm_clientes WHERE fecha='$fecha_consultar'",$conexion);
//Creamos un Arreglo que recorra Fila por Fila
while($fila=mysql_fetch_array($clientes)){
//Creamos y Vaciamos informacion en la fila	
	?>
            <tr onmouseover="color_over(this)" onmouseout="color_out(this)">
              <td><?php echo $fila['id_cliente']; ?></td>
              <td><?php echo $fila['nombre']; ?></td>
              <td><?php echo $fila['engomado_vehiculo']; ?></td>
              <td><?php echo $fila['marca_vehiculo']; ?></td>
              <td><?php echo $fila['modelo_vehiculo']; ?></td>
              <td><?php echo $fila['placas_vehiculo']; ?></td>
              <td><?php echo $fila['fecha']; ?> <?php echo $fila['hora']; ?></td>
            </tr>
            <?php 
  //Finalizamos el Arreglo
  }
  ?>
          </table>
          </div>
          <br /></div></td>
      </tr>
      <tr>
        <td><img src="../imagenes/bg-bottom.png" width="780" height="10" /></td>
      </tr>
</table>
    <br />
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center">2013 © Todos los Derechos Reservados</td>
      </tr>
    </table>
<br /></td>
  </tr>
</table>
</body>
</html>