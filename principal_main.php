<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Principal</title>
<link rel="stylesheet" href="css/css.css" type="text/css">
<?php include 'scripts/conexion.php'; ?>
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
        <td width="600" align="right"> <img src="imagenes/user-miniicon.png" width="18" height="18" /> Bienvenido! (<a href="index.php" class="link">Cerrar Sesión</a>)<br/></td>
      </tr>
      </table>
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><a href="principal_main.php"><img src="imagenes/principal-menu.png" width="97" height="53" /></a><a href="empresa.php"><img src="imagenes/empresa-menu.png" width="97" height="53" /></a><a href="operadores.php"><img src="imagenes/operadores-menu.png" width="97" height="53" /></a><a href="calcomanias.php"><img src="imagenes/calcomanias-menu.png" width="97" height="53" /></a><a href="catalogos.php"><img src="imagenes/catalogos-menu.png" width="97" height="53" /></a><a href="clientes.php"><img src="imagenes/clientes-menu.png" width="97" height="53" /></a><a href="tickets.php"><img src="imagenes/tickets-menu.png" width="97" height="53" /></a><a href="reportes.php"><img src="imagenes/menu-clean-close.png" width="97" height="53" /></a></td>
        </tr>
      </table>
      <br />
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" class="font-tipo-blue">Panel de Administración</td>
        </tr>
        <tr>
          <td align="center"><img src="imagenes/linea.png" width="750" height="1" /></td>
        </tr>
      </table>
      <br />
    <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="390" align="center"><span class="font-stats-green">$<?php
             $recaudacion=mysql_query("SELECT SUM(total) AS total FROM tm_ticket");
			 $fila=mysql_fetch_array($recaudacion, MYSQL_ASSOC);
			 echo $fila["total"];
			 ?>.00 m.n.</span><br />
          Ingreso Total<br />
(General)</td>
        <td width="390" align="center"><span class="font-stats-green">$<?php
		//Establece Zona Horaria Predeterminada
			date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
			$fecha_dia=date("Y-m-d");
             $recaudacion_dia=mysql_query("SELECT SUM(total) AS total FROM tm_ticket WHERE fecha='$fecha_dia'");
			 $fila=mysql_fetch_array($recaudacion_dia, MYSQL_ASSOC);
			 echo $fila["total"];
			 ?>.00 m.n.</span><br />
          Ingreso del Día<br />
(<?php echo $fecha_dia; ?>)</td>
        </tr>
    </table>
    <br />
    <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagenes/bg-top.png" width="780" height="10" /></td>
      </tr>
      <tr>
        <td style="background-image:url(imagenes/bg-content.png); background-repeat:repeat-y;"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50"><img src="imagenes/factory-producto.png" width="47" height="47" /></td>
            <td width="340"><span class="font-title-secciones"><strong>Principal</strong></span><br/>
              <span class="font-descri-secciones">Información General del Sistema, Empresa y Estadisticas Simplificadas</span></td>
            <td width="340" align="right"><img src="imagenes/calendario.png" width="20" height="21" /> <?php print MostrarFechaCompleta(); ?></td>
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
              <td align="center" class="font-grande"><?php
              // Obtener Información de Empresa
			  $empresa = "SELECT * FROM tm_empresa";
			  $info=mysql_query($empresa, $conexion) or die(mysql_error());
			  $infoarray=mysql_fetch_object($info);
					echo $infoarray->nombre;
			  ?></td>
            </tr>
            <tr>
              <td align="center"><?php echo $infoarray->direccion;?>, <?php echo $infoarray->direccion_colonia;?>, Estado de México, México.</td>
            </tr>
            <tr>
              <td align="center">Código Postal: <?php echo $infoarray->codigo_postal;?>, Teléfono: <?php echo $infoarray->telefono;?></td>
            </tr>
            <tr>
              <td align="center"><a href="empresa.php" class="link">Editar Información de la Empresa</a></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="center" class="font-little-blue">Existencia y Costos Actuales</td>
              <td width="375" align="center" class="font-little-blue">Información de Sistema</td>
            </tr>
            <tr>
              <td width="193" align="center"><span class="font-details">
                <?php
              // Información de Costos
			  $costos00 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 00'";
			  $costo00=mysql_query($costos00, $conexion) or die(mysql_error());
			  $costo00array=mysql_fetch_object($costo00);
			  echo $costo00array->nombre;
			  ?>
                = $<?php echo $costo00array->costo; ?>.00 m.n.<br/>
                <?php
              // Información de Costos
			  $costos0 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 0'";
			  $costo0=mysql_query($costos0, $conexion) or die(mysql_error());
			  $costo0array=mysql_fetch_object($costo0);
			  echo $costo0array->nombre;
			  ?>
                = $<?php echo $costo0array->costo; ?>.00 m.n.<br/>
                <?php
              // Información de Costos
			  $costos2 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 2'";
			  $costo2=mysql_query($costos2, $conexion) or die(mysql_error());
			  $costo2array=mysql_fetch_object($costo2);
			  echo $costo2array->nombre;
			  ?>
                = $<?php echo $costo2array->costo; ?>.00 m.n. </span></td>
              <td width="182" align="center" class="font-details">
              	Tipo 00 = <?php
                $existencia_00 = $costo00array->existencia;
				if ($existencia_00 <= 10){ echo "<span class='font-details-red'>".$existencia_00."</span>";}
				elseif ($existencia_00 <= 30){ echo "<span class='font-details-blue'>".$existencia_00."</span>";}
				else { echo "<span class='font-details-green'>".$existencia_00."</span>";}
				?> unidades<br />
                Tipo 0 = <?php
                $existencia_0 = $costo0array->existencia;
				if ($existencia_0 <= 10){ echo "<span class='font-details-red'>".$existencia_0."</span>";}
				elseif ($existencia_0 <= 30){ echo "<span class='font-details-blue'>".$existencia_0."</span>";}
				else { echo "<span class='font-details-green'>".$existencia_0."</span>";}
				?> unidades<br />
                Tipo 2 = <?php
                $existencia_2 = $costo2array->existencia;
				if ($existencia_2 <= 10){ echo "<span class='font-details-red'>".$existencia_2."</span>";}
				elseif ($existencia_2 <= 30){ echo "<span class='font-details-blue'>".$existencia_2."</span>";}
				else { echo "<span class='font-details-green'>".$existencia_2."</span>";}
				?> unidades</td>
              <td width="375" align="center"><span class="font-title-secciones">Número de Operadores en Sistema:
                <?php
            $operadores=mysql_query("SELECT * FROM tc_operadores",$conexion);
			$numero_operadores=mysql_num_rows($operadores);
			if ($numero_operadores==0){
				echo 'Sin Operadores';}
				else {
					echo $numero_operadores;
				}
			 ?>
                <br />
                Número de Clientes Atendidos:
                <?php
            $clientes=mysql_query("SELECT * FROM tm_clientes",$conexion);
			$numero_clientes=mysql_num_rows($clientes);
			if ($numero_clientes==0){
				echo 'Sin Clientes Atendidos';}
				else {
					echo $numero_clientes;
				}
			 ?>
                <br />
                Número de Marcas en Sistema:
                <?php
            $marcas=mysql_query("SELECT * FROM tc_marca",$conexion);
			$numero_marcas=mysql_num_rows($marcas);
			if ($numero_marcas==0){
				echo 'Sin Marcas';}
				else {
					echo $numero_marcas;
				}
			 ?>
                <br />
                Cantidad de Tickets Expedidos:
                <?php
            $tickets=mysql_query("SELECT * FROM tm_ticket",$conexion);
			$numero_tickets=mysql_num_rows($tickets);
			if ($numero_tickets==0){
				echo 'Sin Tickets Expedidos';}
				else {
					echo $numero_tickets;
				}
			 ?>
              </span></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><a href="calcomanias.php" class="link">Modificar Existencia y Costos</a></td>
              <td width="375" align="center">&nbsp;</td>
            </tr>
          </table>
          <br />
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="375" align="center" class="font-little-blue">Calcomanias Cobradas del Día</td>
              <td width="375" align="center" class="font-little-blue">Calcomanias Cobradas en Total</td>
            </tr>
            <tr>
              <td align="center">(<?php echo $fecha_dia; ?>)</td>
              <td width="375" align="center">(General)</td>
            </tr>
            <tr>
              <td align="center" class="font-stats-grey"><?php
				// Obteniendo Número de Calcomanias del Día Tipo 00
				$num_calc_00_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 00'",$conexion);
				$numero_calc_00_dia=mysql_num_rows($num_calc_00_dia);
				// Obteniendo Número de Calcomanias del Día Tipo 0
				$num_calc_0_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 0'",$conexion);
				$numero_calc_0_dia=mysql_num_rows($num_calc_0_dia);
				// Obteniendo Número de Calcomanias del Día Tipo 2
				$num_calc_2_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 2'",$conexion);
				$numero_calc_2_dia=mysql_num_rows($num_calc_2_dia);
				// Obteniendo el Número Total de Calcomanias
				$num_calc_dia = $numero_calc_00_dia + $numero_calc_0_dia + $numero_calc_2_dia;
				if ($num_calc_dia==0){
				echo '0';}
				else {
					echo $num_calc_dia;
				}
			 	?></td>
              <td width="375" align="center" class="font-stats-grey">
              	<?php
				// Obteniendo Número de Calcomanias del Día Tipo 00
				$num_calc_00_total=mysql_query("SELECT * FROM tm_ticket WHERE concepto='Tipo 00'",$conexion);
				$numero_calc_00_total=mysql_num_rows($num_calc_00_total);
				// Obteniendo Número de Calcomanias del Día Tipo 0
				$num_calc_0_total=mysql_query("SELECT * FROM tm_ticket WHERE concepto='Tipo 0'",$conexion);
				$numero_calc_0_total=mysql_num_rows($num_calc_0_total);
				// Obteniendo Número de Calcomanias del Día Tipo 2
				$num_calc_2_total=mysql_query("SELECT * FROM tm_ticket WHERE concepto='Tipo 2'",$conexion);
				$numero_calc_2_total=mysql_num_rows($num_calc_2_total);
				// Obteniendo el Número Total de Calcomanias
				$num_calc_total = $numero_calc_00_total + $numero_calc_0_total + $numero_calc_2_total;
				if ($num_calc_total==0){
				echo '0';}
				else {
					echo $num_calc_total;
				}
			 	?>
              </td>
            </tr>
            <tr>
              <td align="center">
              	Tipo 00 = <?php echo $numero_calc_00_dia ?> Vendidas ($<?php
             	$total_calc_00_dia=mysql_query("SELECT SUM(total) AS total_calc_00 FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 00'");
			 	$fila_calc_00_dia=mysql_fetch_array($total_calc_00_dia, MYSQL_ASSOC);
			 	echo $fila_calc_00_dia["total_calc_00"];
			 	?>.00 m.n.)<br />
                Tipo 0 = <?php echo $numero_calc_0_dia ?> Vendidas ($<?php
             	$total_calc_0_dia=mysql_query("SELECT SUM(total) AS total_calc_0 FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 0'");
			 	$fila_calc_0_dia=mysql_fetch_array($total_calc_0_dia, MYSQL_ASSOC);
			 	echo $fila_calc_0_dia["total_calc_0"];
			 	?>.00 m.n.)<br />
                Tipo 2 = <?php echo $numero_calc_2_dia ?> Vendidas ($<?php
             	$total_calc_2_dia=mysql_query("SELECT SUM(total) AS total_calc_2 FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 2'");
			 	$fila_calc_2_dia=mysql_fetch_array($total_calc_2_dia, MYSQL_ASSOC);
			 	echo $fila_calc_2_dia["total_calc_2"];
			 	?>.00 m.n.)
             </td>
             <td width="375" align="center">
             	Tipo 00 = <?php echo $numero_calc_00_total ?> Vendidas ($<?php
             	$total_calc_00=mysql_query("SELECT SUM(total) AS total_calc_00 FROM tm_ticket WHERE concepto='Tipo 00'");
			 	$fila_calc_00=mysql_fetch_array($total_calc_00, MYSQL_ASSOC);
			 	echo $fila_calc_00["total_calc_00"];
			 	?>.00 m.n.)<br />
    			Tipo 0 = <?php echo $numero_calc_0_total ?> Vendidas ($<?php
             	$total_calc_0=mysql_query("SELECT SUM(total) AS total_calc_0 FROM tm_ticket WHERE concepto='Tipo 0'");
			 	$fila_calc_0=mysql_fetch_array($total_calc_0, MYSQL_ASSOC);
			 	echo $fila_calc_0["total_calc_0"];
				?>.00 m.n.)<br />
                Tipo 2 = <?php echo $numero_calc_2_total ?> Vendidas ($<?php
            	$total_calc_2=mysql_query("SELECT SUM(total) AS total_calc_2 FROM tm_ticket WHERE concepto='Tipo 2'");
			 	$fila_calc_2=mysql_fetch_array($total_calc_2, MYSQL_ASSOC);
			 	echo $fila_calc_2["total_calc_2"];
				?>.00 m.n.)</td>
            </tr>
          </table>
          <br />
<br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="375" align="center" class="font-little-blue">Cortesías Generadas del Día</td>
              <td width="375" align="center" class="font-little-blue">Cortesías Generadas en Total</td>
            </tr>
            <tr>
              <td align="center">(<?php echo $fecha_dia; ?>)</td>
              <td width="375" align="center">(General)</td>
            </tr>
            <tr>
              <td align="center" class="font-stats-grey"><?php
			//Establece Zona Horaria Predeterminada y Asigna Valores a las Variables de Fecha
			date_default_timezone_set('America/Mexico_City');
			$fecha_dia=date("Y-m-d");
			// Obteniendo Número de Cortesias Tipo 0
			$num_cort_0=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 0'",$conexion);
			$numero_cort_0=mysql_num_rows($num_cort_0);
			// Obteniendo Número de Cortesias Tipo 00
			$num_cort_00=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 00'",$conexion);
			$numero_cort_00=mysql_num_rows($num_cort_00);
			// Obteniendo Número de Cortesias Tipo 2
			$num_cort_2=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 2'",$conexion);
			$numero_cort_2=mysql_num_rows($num_cort_2);
			// Número Total de Cortesias del Día
			$numero_total_dia_cortesias = $numero_cort_0 + $numero_cort_00 + $numero_cort_2;
			if ($numero_total_dia_cortesias==0){
				echo '0';}
				else {
					echo $numero_total_dia_cortesias;
				}
			 ?></td>
              <td width="375" align="center" class="font-stats-grey"><?php
			// Obteniendo Número de Cortesias Tipo 0
			$num_cort_0_total=mysql_query("SELECT * FROM tm_ticket WHERE concepto='Cortesía Tipo 0'",$conexion);
			$numero_cort_0_total=mysql_num_rows($num_cort_0_total);
			// Obteniendo Número de Cortesias Tipo 00
			$num_cort_00_total=mysql_query("SELECT * FROM tm_ticket WHERE concepto='Cortesía Tipo 00'",$conexion);
			$numero_cort_00_total=mysql_num_rows($num_cort_00_total);
			// Obteniendo Número de Cortesias Tipo 2
			$num_cort_2_total=mysql_query("SELECT * FROM tm_ticket WHERE concepto='Cortesía Tipo 2'",$conexion);
			$numero_cort_2_total=mysql_num_rows($num_cort_2_total);
			// Número Total de Cortesias del Día
			$numero_total_cortesias = $numero_cort_0_total + $numero_cort_00_total + $numero_cort_2_total;
			if ($numero_total_cortesias==0){
				echo '0';}
				else {
					echo $numero_total_cortesias;
				}
			 ?></td>
            </tr>
            <tr>
              <td align="center">
              	Cortesía Tipo 00 = <?php echo $numero_cort_00; ?> unidades<br />
                Cortesía Tipo 0 = <?php echo $numero_cort_0; ?> unidades <br />
                Cortesía Tipo 2 = <?php echo $numero_cort_2; ?> unidades</td>
              <td width="375" align="center">
              	Cortesía Tipo 00 = <?php echo $numero_cort_00_total; ?> unidades <br />
                Cortesía Tipo 0 = <?php echo $numero_cort_0_total; ?> unidades <br />
                Cortesía Tipo 2 = <?php echo $numero_cort_2_total; ?> unidades</td>
            </tr>
          </table>
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
<br />
</body>
</html>