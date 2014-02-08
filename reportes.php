<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Reportes</title>
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
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- El campo '+nm+' debe contener valores numéricos.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- El Campo '+nm+' es necesario.\n'; }
    } if (errors) alert('Los siguientes errores se han generado:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-image:url(imagenes/bg-login.png); background-position:top center; background-repeat:repeat-x;"><table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
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
    <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagenes/bg-top.png" width="780" height="10" /></td>
      </tr>
      <tr>
        <td style="background-image:url(imagenes/bg-content.png); background-repeat:repeat-y;"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50"><img src="imagenes/stats-producto.png" width="47" height="47" /></td>
            <td width="340"><span class="font-title-secciones"><strong>Reportes</strong></span><br/>
              <span class="font-descri-secciones">Generación de Reportes Diarios y por Periodo. Consulta de Históricos y detalle de Ingresos.</span></td>
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
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="750"><span class="font-title">Reporte por Día </span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
            <tr>
              <td class="font-details-min" style="padding-top:10px;">El Reporte por Día generará el detallado de la fecha Ingresada. Posteriormente si usted desea realizar cambios en los Ingresos, Tickets o Clientes deberá acceder al apartado correspondiente mediante el Menu Superior.</td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><br />
              <form action="reportes/reporte_dia.php" method="post" onsubmit="MM_validateForm('año','','RisNum','mes','','RisNum','dia','','RisNum');return document.MM_returnValue">
                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center"><span class="font-title-secciones"><strong>Ingrese el Día a Consultar</strong></span><strong>:</strong><br />
                    <span class="font-details-min-blue">Formato: (yyyy-mm-dd)</span><span class="font-little-blue"><br />
                    </span><span class="font-details-min">Ejemplo: 2013-07-23
                    </span></td>
                </tr>
                <tr>
                  <td align="center"><input name="año" type="text" class="form-text-costo" id="año" value="Año" maxlength="4" onclick="this.value=''" onfocus="this.value=''"/>
                    -
                      <input name="mes" type="text" class="form-text-costo" id="mes" value="Mes" maxlength="2" onclick="this.value=''" onfocus="this.value=''"/>
                      - 
                      <input name="dia" type="text" class="form-text-costo" id="dia" value="Día" maxlength="2" onclick="this.value=''" onfocus="this.value=''"/></td>
                </tr>
                <tr>
                  <td align="center"><input name="consultar_dia" type="submit" class="form-button" id="consultar_dia" value=""/></td>
                </tr>
              </table>
              </form></td>
            </tr>
          </table>
          <br />
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="750"><span class="font-title">Reporte por Periodo</span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
            <tr>
              <td class="font-details-min" style="padding-top:10px;">El Reporte por Periodo generará el detallado del intervalo ingresado. Este se muestra en detalle acumulado por día, es decir, muestra todos los dias dentro del intervalo señalado asi como sus diferentes detalles, exceptuando los dias que no contengan registros.</td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><br />
                <form action="reportes/reporte_periodo.php" method="post">
                  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center"><span class="font-title-secciones"><strong>Ingrese el Periodo a Consultar</strong></span><strong>:</strong><br />
                        <span class="font-details-min-blue">Formato: (yyyy-mm-dd)</span><span class="font-little-blue"><br />
                        </span><span class="font-details-min">Ejemplo: 2013-07-23 al 2014-02-12</span></td>
                    </tr>
                    <tr>
                      <td width="251" align="right"><input name="año_inicial" type="text" class="form-text-costo" id="año_inicial" value="Año" maxlength="4" onclick="this.value=''" onfocus="this.value=''"/>
                        -
                        <input name="mes_inicial" type="text" class="form-text-costo" id="mes_inicial" value="Mes" maxlength="2" onclick="this.value=''" onfocus="this.value=''"/>
                        -
                        <input name="dia_inicial" type="text" class="form-text-costo" id="dia_inicial" value="Día" maxlength="2" onclick="this.value=''" onfocus="this.value=''"/></td>
                      <td width="81" align="center" class="font-details">al</td>
                      <td width="268" align="left"><input name="año_final" type="text" class="form-text-costo" id="año_final" value="Año" maxlength="4" onclick="this.value=''" onfocus="this.value=''"/>
-
  <input name="mes_final" type="text" class="form-text-costo" id="mes_final" value="Mes" maxlength="2" onclick="this.value=''" onfocus="this.value=''"/>
-
<input name="dia_final" type="text" class="form-text-costo" id="dia_final" value="Día" maxlength="2" onclick="this.value=''" onfocus="this.value=''"/></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center"><input name="consultar_periodo" type="submit" class="form-button" id="consultar_periodo" value=""/></td>
                    </tr>
                  </table>
                </form></td>
            </tr>
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
