<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Empresa</title>
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
            <td width="50"><img src="imagenes/factory-producto.png" width="47" height="47" /></td>
            <td width="340"><span class="font-title-secciones"><strong>Empresa</strong></span><br/>
              <span class="font-descri-secciones">Información General de la Empresa. Esta información se ve reflejada en los Tickets expedidos por el Sistema, es por ello, que la información proporcionada debera ser validada antes de procesarla.</span></td>
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
              <td width="750"><span class="font-title">Modificar Información de Empresa</span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <form action="modulos/empresa_actualizar.php" method="post">
          <?php
              // Obtener Información de Empresa
			  $empresa = "SELECT * FROM tm_empresa";
			  $info=mysql_query($empresa, $conexion) or die(mysql_error());
			  $infoarray=mysql_fetch_object($info);
			  ?><br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="230"><span class="font-details">Nombre de la Empresa:</span></td>
              <td width="520"><input name="nombre_empresa" type="text" class="form-text" id="nombre_empresa" value="<?php echo $infoarray->nombre; ?>"/>
                <input name="id_empresa" type="hidden" id="id_empresa" value="<?php echo $infoarray->id_empresa; ?>"/></td>
            </tr>
            <tr>
              <td class="font-details">Titular:</td>
              <td width="520"><input name="titular" type="text" class="form-text-large" id="titular" value="<?php echo $infoarray->titular; ?>"/></td>
            </tr>
            <tr>
              <td class="font-details">Dirección:</td>
              <td width="520"><input name="direccion" type="text" class="form-text-large" id="direccion" value="<?php echo $infoarray->direccion; ?>"/></td>
            </tr>
            <tr>
              <td class="font-details">Colonia:</td>
              <td width="520"><input name="direccion_colonia" type="text" class="form-text-large" id="direccion_colonia" value="<?php echo $infoarray->direccion_colonia; ?>"/></td>
            </tr>
            <tr>
              <td class="font-details">Ciudad:</td>
              <td width="520"><input name="direccion_ciudad" type="text" class="form-text" id="direccion_ciudad" value="Cuautitlán Izcalli" readonly="readonly"/></td>
            </tr>
            <tr>
              <td class="font-details">Estado:</td>
              <td width="520"><input name="direccion_estado" type="text" class="form-text" id="direccion_estado" value="Estado de México" readonly="readonly"/></td>
            </tr>
            <tr>
              <td class="font-details">Teléfono:</td>
              <td width="520"><input name="telefono" type="text" class="form-text" id="telefono" value="<?php echo $infoarray->telefono; ?>"/></td>
            </tr>
            <tr>
              <td class="font-details">Código Postal:</td>
              <td width="520"><input name="codigo_postal" type="text" class="form-text-costo" id="codigo_postal" value="<?php echo $infoarray->codigo_postal; ?>" size="6" maxlength="6"/></td>
            </tr>
            <tr>
              <td class="font-details">RFC de la Empresa:</td>
              <td width="520"><input name="rfc" type="text" class="form-text" id="rfc" value="<?php echo $infoarray->rfc; ?>"/></td>
            </tr>
            <tr>
              <td class="font-details">Correo Electrónico:</td>
              <td width="520"><input name="mail" type="text" class="form-text-large" id="mail" value="<?php	echo $infoarray->mail; ?>"/></td>
            </tr>
            <tr>
              <td class="font-details">Leyenda ( <a href="#" class="link-editar" title="Esta información aparecera al Pie de los Tickets expedidos por el Sistema. Puede ser utilizado para colocar anuncios publicitarios o mensajes para el Usuario Final.">?</a> ):</td>
              <td width="520"><input name="leyenda" type="text" class="form-text-large" id="leyenda" value="<?php echo $infoarray->leyenda; ?>"/></td>
            </tr>
            <tr>
              <td colspan="2" align="center" class="font-details" style="padding-top:15px;"><input type="submit" name="guardar" id="guardar" value="" class="form-button-guardar" title="Guardar Cambios"/><br /></td>
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
</body>
</html>
