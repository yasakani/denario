<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Catalogos</title>
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
            <td width="50"><img src="imagenes/icon-catalogos.png" width="56" height="57" /></td>
            <td width="340"><span class="font-title-secciones"><strong>Catálogos</strong></span><br/>
              <span class="font-descri-secciones">Información de los Catálogos que se utilizan dentro del Sistema para el proceso de Cobro. Funciones de Eliminación y Adición de elementos a los Catálogos principales.</span></td>
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
              <td width="375"><span class="font-title">Catálogo de Marcas</span></td>
              <td width="375" align="right"><span class="font-details-min">
                Número de Marcas en Sistema: <b><?php
            $marcas=mysql_query("SELECT * FROM tc_marca",$conexion);
			$numero_marcas=mysql_num_rows($marcas);
			if ($numero_marcas==0){
				echo 'Sin Marcas';}
				else {
					echo $numero_marcas;
				}
			 ?></b>
              </span></td>
            </tr>
            <tr>
              <td colspan="2" style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <form action="modulos/agregar_marca.php" method="post">
            <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="191" valign="top" class="font-details">Agregar Marca de Vehículo:</td>
              <td width="250"><input name="nombre_marca" type="text" class="form-text" id="nombre_marca" /></td>
              <td width="309" valign="top"><span style="padding-top:5px;">
                <input name="button" type="submit" class="form-button-guardar" id="button" value="" />
                </span></td>
            </tr>
            </table>
    </form><br/>
      <form action="modulos/eliminar_marca.php" method="post">
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="191" class="font-details">Eliminar Marca de Vehículo:</td>
              <td width="110" style="padding-right:10px;"><select class="form-list" name="marca" id="marca">
                <?php
$marcas=mysql_query("SELECT * FROM tc_marca ORDER BY nombre ASC",$conexion);
while($fila_marcas=mysql_fetch_array($marcas)){ ?>
                <option><?php echo $fila_marcas['nombre']; ?></option>
                <?php } ?>
              </select></td>
              <td width="449"><input name="button2" type="submit" class="form-button" id="button2" value="" /></td>
            </tr>
        </table>
        </form>
<br />
<br />
<br />
<br />
<br />
<br />
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
