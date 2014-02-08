<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Calcomanias</title>
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
            <td width="50"><img src="imagenes/money-producto.png" width="57" height="57" /></td>
            <td width="340"><span class="font-title-secciones"><strong>Calcomanias</strong></span><br/>
              <span class="font-descri-secciones">Información de Costos y Existencias. Precio de los diferentes Tipos de Calcomanias. Estos parametros son globales y afectan directamente al cálculo de ingresos.</span></td>
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
              <td width="750"><span class="font-title">Actualizar Costos y Existencia de Calcomanias</span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center">
            <tr>
              <td>- El costo de las Calcomanías en Sistema, deberá de ser ingresado en el <span class="font-details-min-blue">formato indicado</span>, sin centavos, caracteres especiales y/o cantidades expresadas en forma negativa.<br />
                <br />
                <span class="font-pequeña">- La selección de Tipo de Calcomanía destacada como &quot;<span class="font-details-min-blue">Cortesía</span>&quot; en el Módulo de &quot;<span class="font-details-min-blue">Caja General</span>&quot;, no presenta alteraciones en el cálculo general de los ingresos ya que estas se calcularan a </span><span class="font-details-min-blue">$00.00 m.n.</span><span class="font-pequeña">, sin embargo, afectara la existencia de las Calcomanías en Sistema.<br />
                <br />
- La existencia de Calcomanías en Sistema afectara directamente al Módulo de &quot;<span class="font-details-min-blue">Caja General</span>&quot;, ya que si la existencia de alguna de las calcomanías es <span class="font-details-min-blue">igual a 0</span>, el sistema impedirá efectuar el cobro de dicha calcomanía.</span></td>
            </tr>
          </table>
          <br />
          <form action="modulos/calcomanias_actualizar.php" method="post">
            <table width="750" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td width="250" align="center" class="font-details"><?php
              // Información de Costos
			  $costos00 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 00'";
			  $costo00=mysql_query($costos00, $conexion) or die(mysql_error());
			  $costo00array=mysql_fetch_object($costo00); ?>
              Tipo
                <input type="hidden" name="id_00" id="id_00" value="<?php echo $costo00array->id_calcomania; ?>"/></td>
              <td width="250" align="center" class="font-details">
              
              <?php
              // Información de Costos
			  $costos0 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 0'";
			  $costo0=mysql_query($costos0, $conexion) or die(mysql_error());
			  $costo0array=mysql_fetch_object($costo0); ?>
              Tipo
                <input type="hidden" name="id_0" id="id_0" value="<?php echo $costo0array->id_calcomania; ?>"/></td>
              <td width="250" align="center" class="font-details"><?php
              // Información de Costos
			  $costos2 = "SELECT * FROM tc_calcomanias WHERE nombre='Tipo 2'";
			  $costo2=mysql_query($costos2, $conexion) or die(mysql_error());
			  $costo2array=mysql_fetch_object($costo2); ?>Tipo
                <input type="hidden" name="id_2" id="id_2" value="<?php echo $costo2array->id_calcomania; ?>"/></td>
            </tr>
            <tr>
              <td align="center" class="font-tipo-blue">00</td>
              <td align="center" class="font-tipo-blue">0</td>
              <td align="center" class="font-tipo-blue">2</td>
            </tr>
            <tr>
              <td colspan="3" align="center" bgcolor="#EEEEEE" class="font-little-blue" style="padding-top:5px; padding-bottom:5px;">Costos</td>
              </tr>
            <tr>
              <td align="center"><span class="font-details">$</span>
                <input name="costo_00" type="text" class="form-text-costo" id="costo_00" value="<?php echo $costo00array->costo; ?>" maxlength="5"/>
                <span class="font-details">.00 m.n.</span></td>
              <td align="center"><span class="font-details">$ 
                </span>
                <input name="costo_0" type="text" class="form-text-costo" id="costo_0" value="<?php echo $costo0array->costo; ?>" maxlength="5"/>
                <span class="font-details">.00 m.n.</span></td>
              <td align="center"><span class="font-details">$
                <input name="costo_2" type="text" class="form-text-costo" id="costo_2" value="<?php echo $costo2array->costo; ?>" maxlength="5"/>
                .00 m.n.</span></td>
            </tr>
            <tr>
              <td colspan="3" align="center" bgcolor="#EEEEEE" class="font-little-blue" style="padding-top:5px; padding-bottom:5px;">Existencia</td>
              </tr>
            <tr>
              <td align="center"><input name="existencia_00" type="text" class="form-text-costo" id="existencia_00" maxlength="4" value="<?php echo $costo00array->existencia; ?>"/>
                <span class="font-details">unidades</span></td>
              <td align="center"><input name="existencia_0" type="text" class="form-text-costo" id="existencia_0" maxlength="4" value="<?php echo $costo0array->existencia; ?>"/>
                <span class="font-details">unidades</span></td>
              <td align="center"><input name="existencia_2" type="text" class="form-text-costo" id="existencia_2" maxlength="4" value="<?php echo $costo2array->existencia; ?>"/>
                <span class="font-details">unidades</span></td>
            </tr>
            <tr>
              <td colspan="3" align="center" style="padding-top:30px;">
                <input type="submit" name="actualizar" id="actualizar" value="" class="form-button-actualizar" title="Actualizar Calcomanias"/>
                </td>
            </tr>
          </table>
  </form>
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
