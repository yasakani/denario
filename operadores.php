<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Operadores</title>
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
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe contener una dirección de correo valida.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- El campo '+nm+' es necesario.\n'; }
    } if (errors) alert('Denario : Operadores\n\nNo es posible dar de Alta al Operador debido a:\n'+errors);
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
            <td width="50"><img src="imagenes/operador-icon-section.png" width="51" height="45" /></td>
            <td width="340"><span class="font-title-secciones"><strong>Operadores</strong></span><br/>
              <span class="font-descri-secciones">Información general de los Operadores del Sistema, asi como funciones de Adición y Eliminación de los mismos.</span></td>
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
              <td width="750"><span class="font-title">Agregar Operador a Sistema</span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <form action="modulos/agregar_operador.php" method="post" onsubmit="MM_validateForm('nombre_operador','','R','usuario','','R','password','','R');return document.MM_returnValue">
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="174" class="font-details">Nombre del Operador:</td>
              <td width="576"><input name="nombre_operador" type="text" class="form-text-large" id="nombre_operador" /></td>
            </tr>
            <tr>
              <td class="font-details">Cargo:</td>
              <td><select name="cargo" class="form-list" id="cargo">
                <option>Administrador</option>
                <option>Cajero</option>
                <option>Consultor</option>
              </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="font-details">Usuario:</td>
              <td><input name="usuario" type="text" class="form-text" id="usuario" /></td>
            </tr>
            <tr>
              <td class="font-details">Password:</td>
              <td><input name="password" type="password" class="form-text" id="password" /></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input name="button2" type="submit" class="form-button-guardar" id="button2" value="" /></td>
            </tr>
            </table>
            </form>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="750"><span class="font-title">Eliminar Operador de Sistema</span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <form action="modulos/eliminar_operador.php" method="post">
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="130" class="font-details">ID de Operador:</td>
              <td width="70"><input name="id_operador" type="text" class="form-text-costo" id="id_operador" size="3" maxlength="3" /></td>
              <td width="550"><input name="button" type="submit" class="form-button" id="button" value="" /></td>
            </tr>
          </table>
          </form>
          <br />
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="750"><span class="font-title">Operadores Activos en Sistema</span></td>
            </tr>
            <tr>
              <td style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="font-little-blue">
              <td width="57">ID</td>
              <td width="343">Nombre</td>
              <td width="180">Cargo</td>
              <td width="170">Fecha de Alta</td>
            </tr>
            
            <?php 
//Consulta para Obtener Productos
$operadores=mysql_query("SELECT * FROM tc_operadores ORDER BY id_operador ASC",$conexion);
//Creamos un Arreglo que recorra Fila por Fila
while($fila=mysql_fetch_array($operadores)){
//Creamos y Vaciamos informacion en la fila	
	?><tr>
              <td><?php echo $fila['id_operador']; ?></td>
              <td><?php echo $fila['nombre_operador']; ?></td>
              <td><?php echo $fila['cargo']; ?></td>
              <td><?php echo $fila['fecha_alta']; ?> <?php echo $fila['hora_alta']; ?></td>
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
  <tr>
    <td style="background-image:url(imagenes/bg-login.png); background-position:top center; background-repeat:repeat-x;">&nbsp;</td>
  </tr>
</table>
</body>
</html>
