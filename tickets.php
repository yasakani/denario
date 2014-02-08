<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Clientes</title>
<link rel="stylesheet" href="css/css.css" type="text/css">
<script language="JavaScript" type="text/javascript" src="detalle_ticket.js"></script>
<?php include 'scripts/conexion.php'; ?>
<script language="javascript"> 
function color_over(fila){ fila.style.backgroundColor="#BDD5FF"}  
function color_out(fila){ fila.style.backgroundColor=""}
</script>
<?php
function MostrarFecha($FechaEstablecida){
	$fechaAnio = date('Y',$FechaEstablecida);
	$fechaMes = date('m',$FechaEstablecida);
	$fechaDia = date('d',$FechaEstablecida);
	$dia = date('w',$FechaEstablecida);
		switch($dia){
			case 0: $dia="Domingo"; break;
			case 1: $dia="Lunes"; break;
			case 2: $dia="Martes"; break;
			case 3: $dia="Mi&eacute;rcoles"; break;
			case 4: $dia="Jueves"; break;
			case 5: $dia="Viernes"; break;
			case 6: $dia="S&aacute;bado"; break;
		}
		switch($fechaMes) {
			case '01': $mes="Enero"; break;
			case '02': $mes="Febrero"; break;
			case '03': $mes="Marzo"; break;
			case '04': $mes="Abril"; break;
			case '05': $mes="Mayo"; break;
			case '06': $mes="Junio"; break;
			case '07': $mes="Julio"; break;
			case '08': $mes="Agosto"; break;
			case '09': $mes="Septiembre"; break;
			case '10': $mes="Octubre"; break;
			case '11': $mes="Noviembre"; break;
			case '12': $mes="Diciembre"; break;
		}
	return "" . $dia . ", " . $fechaDia . " de " . $mes . " del " . $fechaAnio . "";
}
function MostrarFechaCompleta() {
	$expire=time()+60*60*24*30;
	$fecha = time();
	$fecha = MostrarFecha($fecha) . ' | ';
	date_default_timezone_set("America/Mexico_City");
	$hora = date("h:i:s a"); 
	return $fecha . $hora;
}
?>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-image:url(imagenes/bg-login.png); background-position:top center; background-repeat:repeat-x; background-attachment:fixed;"><table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="180" align="center"><img src="imagenes/logo-principal-min.png" width="120" height="58" title="Denario"/></td>
        <td width="600" align="right"> <img src="imagenes/user-miniicon.png" width="18" height="18" /> Bienvenido!  (<a href="index.php" class="link">Cerrar Sesión</a>)<br/></td>
      </tr>
      </table>
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><a href="principal_main.php"><img src="imagenes/principal-menu.png" width="97" height="53" /></a><a href="empresa.php"><img src="imagenes/empresa-menu.png" width="97" height="53" /></a><a href="operadores.php"><img src="imagenes/operadores-menu.png" width="97" height="53" /></a><a href="calcomanias.php"><img src="imagenes/calcomanias-menu.png" width="97" height="53" /></a><a href="catalogos.php"><img src="imagenes/catalogos-menu.png" width="97" height="53" /></a><a href="clientes.php"><img src="imagenes/clientes-menu.png" width="97" height="53" /></a><a href="tickets.php"><img src="imagenes/tickets-menu.png" width="97" height="53" /></a><a href="reportes.php"><img src="imagenes/menu-clean-close.png" width="97" height="53" /></a></td>
        </tr>
      </table>
      <br />
      <br />
      <br />
    <br />
    <table width="779" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="779"><img src="imagenes/bg-top.png" width="780" height="10" /></td>
      </tr>
      <tr>
        <td style="background-image:url(imagenes/bg-content.png); background-repeat:repeat-y;"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="56"><img src="imagenes/ticket-icon-section.png" width="51" height="51" /></td>
            <td width="344"><span class="font-title-secciones"><strong>Tickets</strong></span><br/>
              <span class="font-descri-secciones">Vista General de Tickets. Funciones de Cancelación y Busqueda de Comprobantes actualmente en Sistema.</span></td>
            <td width="350" align="right"><img src="imagenes/calendario.png" width="20" height="21" /> <?php print MostrarFechaCompleta(); ?></td>
          </tr>
        </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
        </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><span class="font-details-min-blue">- Asegúrese de ingresar el Número correcto de comprobante.<br />
- Al eliminar un Ticket del Sistema, este último realizará nuevamente el cálculo del ingreso total y diario automáticamente.</span></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="375"><span class="font-title">Consultar Ticket</span></td>
              <td width="375" class="font-title">Eliminar/Cancelar Ticket de Sistema</td>
            </tr>
            <tr>
              <td colspan="2" style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="145" class="font-details">Número de Ticket (<a href="#" class="link-editar" title="Ingrese el Número de Ticket (Comprobante de Pago)  para consultar la información del mismo. El Número de Ticket se encuentra en la lista posterior o puede ser consultado en el Comprobante Impreso generado al Efectuar un Cobro.">?</a>):</td>
              <form method="post" id="formulario" name="formulario">
              <td width="110"><input name="numero_ticket" type="text" class="form-text-medium" id="numero_ticket" size="5" maxlength="5" onchange="pedirDatos()"/></td>
              <td width="120">&nbsp;</td>
              </form>
              <form action="modulos/eliminar_ticket.php" method="post">
              <td width="155" class="font-details">Número de  Ticket:</td>
              <td width="60"><input name="id_ticket" type="text" class="form-text-costo" id="id_ticket" size="5" maxlength="5" /></td>
              <td width="160"><input name="eliminar_ticket" type="submit" class="form-button" id="eliminar_ticket" value="" /></td>
              </form>
            </tr>
          </table>
          <span class="font-details-min" style="padding-left:5px;"><br/><div id="resultado"></div></span>
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="185"><span class="font-title">Tickets en Sistema</span></td>
              <td width="565" class="font-details-min-blue">Mostrando Tickets correspondientes a: <?php
              //Establece Zona Horaria Predeterminada
date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
$fecha_dia=date("Y-m-d");
			  echo $fecha_dia; ?></td>
            </tr>
            <tr>
              <td colspan="2" style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
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
//Establece Zona Horaria Predeterminada
date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
$fecha_dia=date("Y-m-d");
//Consulta para Obtener Productos
$tickets=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia'",$conexion);
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
          <br />
          <br /></td>
      </tr>
      <tr>
        <td><img src="imagenes/bg-bottom.png" width="780" height="10" /></td>
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