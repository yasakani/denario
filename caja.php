<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Caja</title>
<link rel="stylesheet" href="css/css.css" type="text/css">
<?php include 'scripts/conexion.php'; ?>
<?php
//Obtener valores del Formulario de Login
$usuario = $_POST['usuario']; 
$password = $_POST['password'];
// Comparacion de Valores del Login
$log = "SELECT * FROM tc_operadores WHERE usuario='$usuario' AND password='$password'";
$login=mysql_query($log, $conexion) or die(mysql_error());
if (mysql_num_rows($login)==0){
echo "<script language='javascript'>window.location='index_caja.php'</script>";
	die();
}
$loginarray=mysql_fetch_object($login);
?>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe contener una dirección de correo valida.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- El campo '+nm+' es necesario.\n'; }
    } if (errors) alert('Denario : Caja\n\nNo es posible Efectuar el Cobro debido a:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-image:url(imagenes/bg-login.png); background-position:top center; background-repeat:repeat-x; background-attachment:fixed;"><table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="180" align="center"><img src="imagenes/logo-principal-min.png" width="120" height="58" title="Denario"/></td>
        <td width="600" align="right"> <img src="imagenes/user-miniicon.png" width="18" height="18" /> Bienvenido! <b><?php echo $loginarray->nombre_operador; ?></b>, <?php echo $loginarray->cargo; ?> (<a href="index_caja.php" class="link">Cerrar Sesión</a>)<br/></td>
      </tr>
      </table>
      <br />
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td align="center" class="font-tipo-blue">Caja General</td>
        </tr>
        <tr>
          <td align="center"><img src="imagenes/linea.png" width="750" height="1" /></td>
        </tr>
      </table>
      <br />
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="780" align="center" class="font-grande"><?php
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
          <td align="center"><span class="font-stats-green">$<?php
		//Establece Zona Horaria Predeterminada
			date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
			$fecha_dia=date("Y-m-d");
             $recaudacion_dia=mysql_query("SELECT SUM(total) AS total FROM tm_ticket WHERE fecha='$fecha_dia'");
			 $fila=mysql_fetch_array($recaudacion_dia, MYSQL_ASSOC);
			 echo $fila["total"];
			 ?>.00 m.n.</span><br /> 
            Ingreso del Día<br/>(<?php echo $fecha_dia; ?>)
</td>
        </tr>
      </table>
      <br />
      <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="160"><span class="font-little-blue">Costos Actuales</span><br />
            <span class="font-title-secciones">
            <?php
              // Información de Costos
			  $costos00 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 00'";
			  $costo00=mysql_query($costos00, $conexion) or die(mysql_error());
			  $costo00array=mysql_fetch_object($costo00);
			  echo $costo00array->nombre;
			  ?> 
            = $<?php echo $costo00array->costo; ?>.00 m.n.<br />
          <?php
              // Información de Costos
			  $costos0 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 0'";
			  $costo0=mysql_query($costos0, $conexion) or die(mysql_error());
			  $costo0array=mysql_fetch_object($costo0);
			  echo $costo0array->nombre;
			  ?> = $<?php echo $costo0array->costo; ?>.00 m.n.<br />
          <?php
              // Información de Costos
			  $costos2 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 2'";
			  $costo2=mysql_query($costos2, $conexion) or die(mysql_error());
			  $costo2array=mysql_fetch_object($costo2);
			  echo $costo2array->nombre;
			  ?> = $<?php echo $costo2array->costo; ?>.00 m.n.</span><br />
</td>
          <td width="280"><span class="font-little-blue">Calcomanias Cobradas del Día (<?php
			//Establece Zona Horaria Predeterminada y Asigna valores a las Variables de Fecha/Hora
			date_default_timezone_set('America/Mexico_City');
			$fecha_dia=date("Y-m-d");
			// Obteniendo Número de Calcomanias del Día Tipo 00
            $num_calc_00_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 00'",$conexion);
			$numero_calc_00_dia=mysql_num_rows($num_calc_00_dia);
			// Obteniendo Número de Calcomanias del Día Tipo 0
            $num_calc_0_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 0'",$conexion);
			$numero_calc_0_dia=mysql_num_rows($num_calc_0_dia);
			// Obteniendo Número de Calcomanias del Día Tipo 2
            $num_calc_2_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 2'",$conexion);
			$numero_calc_2_dia=mysql_num_rows($num_calc_2_dia);
			// Obteniendo Número Total de Calcomanias del Día
			$numero_calc_dia = $numero_calc_00_dia + $numero_calc_0_dia + $numero_calc_2_dia;
			if ($numero_calc_dia==0){
				echo '0';}
				else {
					echo $numero_calc_dia;
				}
			 ?>)</span><br />
            <span class="font-title-secciones">Tipo 00 = <?php echo $numero_calc_00_dia ?> Vendidas ($<?php
             $total_calc_00=mysql_query("SELECT SUM(total) AS total_calc_00 FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 00'");
			 $fila_calc_00=mysql_fetch_array($total_calc_00, MYSQL_ASSOC);
			 echo $fila_calc_00["total_calc_00"];
			 ?>.00 m.n.)<br />
            Tipo 0 = <?php echo $numero_calc_0_dia ?> Vendidas ($<?php
             $total_calc_0=mysql_query("SELECT SUM(total) AS total_calc_0 FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 0'");
			 $fila_calc_0=mysql_fetch_array($total_calc_0, MYSQL_ASSOC);
			 echo $fila_calc_0["total_calc_0"];
			 ?>.00 m.n.)<br />
            Tipo 2 = <?php echo $numero_calc_2_dia ?> Vendidas ($<?php
             $total_calc_2=mysql_query("SELECT SUM(total) AS total_calc_2 FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Tipo 2'");
			 $fila_calc_2=mysql_fetch_array($total_calc_2, MYSQL_ASSOC);
			 echo $fila_calc_2["total_calc_2"];
			 ?>.00 m.n.)</span></td>
          <td width="160"><span class="font-little-blue">Existencia</span><br />
            <span class="font-title-secciones">Tipo 00 = <?php
                $existencia_00 = $costo00array->existencia;
				if ($existencia_00 <= 10){ echo "<span class='font-title-secciones-red'>".$existencia_00."</span>";}
				elseif ($existencia_00 <= 30){ echo "<span class='font-title-secciones-blue'>".$existencia_00."</span>";}
				else { echo "<span class='font-title-secciones-green'>".$existencia_00."</span>";}
				?> unidades<br />
          Tipo 0 = <?php
                $existencia_0 = $costo0array->existencia;
				if ($existencia_0 <= 10){ echo "<span class='font-title-secciones-red'>".$existencia_0."</span>";}
				elseif ($existencia_0 <= 30){ echo "<span class='font-title-secciones-blue'>".$existencia_0."</span>";}
				else { echo "<span class='font-title-secciones-green'>".$existencia_0."</span>";}
				?> unidades<br />
          Tipo 2 = <?php
                $existencia_2 = $costo2array->existencia;
				if ($existencia_2 <= 10){ echo "<span class='font-title-secciones-red'>".$existencia_2."</span>";}
				elseif ($existencia_2 <= 30){ echo "<span class='font-title-secciones-blue'>".$existencia_2."</span>";}
				else { echo "<span class='font-title-secciones-green'>".$existencia_2."</span>";}
				?> unidades</span></td>
          <td width="180"><span class="font-little-blue">Cortesías Generadas (<?php
		  	// Obteniendo Número de Cortesias del Día Tipo 00
            $num_cortesias_00_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 00'",$conexion);
			$numero_cortesias_00_dia=mysql_num_rows($num_cortesias_00_dia);
			// Obteniendo Número de Cortesias del Día Tipo 0
            $num_cortesias_0_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 0'",$conexion);
			$numero_cortesias_0_dia=mysql_num_rows($num_cortesias_0_dia);
			// Obteniendo Número de Cortesias del Día Tipo oo
            $num_cortesias_2_dia=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 2'",$conexion);
			$numero_cortesias_2_dia=mysql_num_rows($num_cortesias_2_dia);
			// Número de Cortesias del Día
			$numero_cortesias_dia = $numero_cortesias_00_dia + $numero_cortesias_0_dia + $numero_cortesias_2_dia;
			if ($numero_cortesias_dia==0){
				echo '0';}
				else {
					echo $numero_cortesias_dia;
				}
			 ?>)</span><br />
            <span class="font-title-secciones">Tipo 00 = <?php
			//Establece Zona Horaria Predeterminada
			date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
			$fecha_dia=date("Y-m-d");
            $num_cort_00=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 00'",$conexion);
			$numero_cort_00=mysql_num_rows($num_cort_00);
			if ($numero_cort_00==0){
				echo '0';}
				else {
					echo $numero_cort_00;
				}
			 ?> unidades<br />
            Tipo 0 = <?php
			//Establece Zona Horaria Predeterminada
			date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
			$fecha_dia=date("Y-m-d");
            $num_cort_0=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 0'",$conexion);
			$numero_cort_0=mysql_num_rows($num_cort_0);
			if ($numero_cort_0==0){
				echo '0';}
				else {
					echo $numero_cort_0;
				}
			 ?> unidades<br />
            Tipo 2 = <?php
			//Establece Zona Horaria Predeterminada
			date_default_timezone_set('America/Mexico_City');
// Asigna valores a las Variables de Fecha/Hora
			$fecha_dia=date("Y-m-d");
            $num_cort_2=mysql_query("SELECT * FROM tm_ticket WHERE fecha='$fecha_dia' AND concepto='Cortesía Tipo 2'",$conexion);
			$numero_cort_2=mysql_num_rows($num_cort_2);
			if ($numero_cort_2==0){
				echo '0';}
				else {
					echo $numero_cort_2;
				}
			 ?> unidades</span></td>
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
            <td width="50"><img src="imagenes/venta-producto.png" width="47" height="47" /></td>
            <td><span class="font-title-secciones"><strong>Efectuar Cobro</strong></span><br/>
              <span class="font-descri-secciones">Captura de Información para Cobro del Servicio y generación de Comprobante de Pago</span></td>
            </tr>
        </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
        </table>
        <form action="modulos/cobro.php" method="post" target="_blank" onsubmit="MM_validateForm('placas_1','','R','placas_2','','R','modelo','','R','nombre_cliente','','R');return document.MM_returnValue">
          <br />
          <input name="operador" id="operador" value="<?php echo $loginarray->nombre_operador; ?>" readonly="readonly" type="hidden"/>
          <br />
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="81" align="center"><img src="imagenes/car-icon.png" width="56" height="57" /></td>
              <td width="569"><span class="font-title">Información del Vehículo</span></td>
            </tr>
      </table>
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="160" class="font-details">Placas:</td>
              <td width="490"><input name="placas_1" type="text" class="form-text-costo" id="placas_1" size="3" maxlength="3" />
                -
                <input name="placas_2" type="text" class="form-text-costo" id="placas_2" size="4" maxlength="4" /></td>
            </tr>
            <tr>
              <td class="font-details">Marca:</td>
              <td><select name="marca" class="form-list" id="marca">
                <?php
$marcas=mysql_query("SELECT * FROM tc_marca ORDER BY nombre ASC",$conexion);
while($fila_marcas=mysql_fetch_array($marcas)){ ?>
  <option><?php echo $fila_marcas['nombre']; ?></option>
  <?php } ?>
              </select></td>
            </tr>
            <tr>
              <td class="font-details">Modelo:</td>
              <td><input name="modelo" type="text" class="form-text" id="modelo" />
              </td>
            </tr>
            <tr>
              <td class="font-details">Engomado:</td>
              <td><select name="engomado" class="form-list" id="engomado">
                <option>Amarillo</option>
                <option>Rosa</option>
                <option>Rojo</option>
                <option>Verde</option>
                <option>Azul</option>
              </select></td>
            </tr>
        </table>
          <br />
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="81" align="center"><img src="imagenes/operador-icon-section.png" width="51" height="45" /></td>
              <td width="569"><span class="font-title">Información del Propietario</span></td>
            </tr>
          </table>
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="160" class="font-details">Nombre:</td>
              <td width="490"><input name="nombre_cliente" type="text" class="form-text-large" id="nombre_cliente" /></td>
            </tr>
            <tr>
              <td class="font-details">Correo Electrónico:</td>
              <td><input name="mail_cliente" type="text" class="form-text" id="mail_cliente" /></td>
            </tr>
      </table>
          <br />
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="81" align="center"><img src="imagenes/money-producto.png" width="57" height="57" /></td>
              <td width="569"><span class="font-title">Pago del Servicio</span></td>
            </tr>
          </table>
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="160" class="font-details">Tipo de Calcomania:</td>
              <td width="90"><select name="tipo_calcomania" class="form-list" id="tipo_calcomania">
                <?php
$calcomanias=mysql_query("SELECT * FROM tc_calcomanias ORDER BY nombre ASC",$conexion);
while($fila_calcomanias=mysql_fetch_array($calcomanias)){ ?>
                <option><?php echo $fila_calcomanias['nombre']; ?></option>
                <?php } ?>
              </select></td>
              <td width="400"><input type="checkbox" name="cortesia_check" id="cortesia_check"/>
                <span class="font-details">Generar Cortesía</span></td>
              </tr>
            <tr>
              <td class="font-details">Forma de Pago:</td>
              <td colspan="2"><select name="forma_pago" class="form-list" id="forma_pago">
                <option>Efectivo</option>
                <option>Tarjeta Debito/Credito</option>
              </select></td>
            </tr>
            <tr>
              <td class="font-details">Referencia: (<a href="#" class="link-editar" title="Número de Referencia en caso de ser Pago con Tarjeta. Este número es generado por la Terminal de Cobro">?</a>)</td>
              <td colspan="2"><input name="referencia" type="text" class="form-text" id="referencia" /></td>
            </tr>
        </table>
          <br />
          <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><input name="cobrar" type="submit" class="form-button-cobrar" id="cobrar" value=""/></td>
            </tr>
      </table>
      </form>
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