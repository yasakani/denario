<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Clientes</title>
<link rel="stylesheet" href="css/css.css" type="text/css">
<script language="JavaScript" type="text/javascript" src="detalle_cliente.js"></script>
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
            <td width="56"><img src="imagenes/cliente-icon-section.png" width="51" height="50" /></td>
            <td width="344"><span class="font-title-secciones"><strong>Clientes</strong></span><br/>
              <span class="font-descri-secciones">Listado General de los clientes ingresados en sistema a través de Cobro de Calcomania. Funciones de Consulta sobre el listado de clientes.</span></td>
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
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="375"><span class="font-title">Buscar Cliente</span></td>
              <td width="375" class="font-title">Eliminar Registro de Cliente</td>
            </tr>
            <tr>
              <td colspan="2" style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
            </tr>
          </table>
          <br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="75" class="font-details">Placas (<a href="#" class="link-editar" title="Al reaizar la busqueda del Cliente por Número de Placas, es necesario realizarlo con las literales y numeros separando por un '-' (Ejemplo: LZF-7145)">?</a>):</td>
              <form method="post" id="formulario" name="formulario">
              <td width="100"><input name="placas" type="text" class="form-text-medium" id="placas" size="8" maxlength="8" onchange="pedirDatos()"/></td>
              <td width="200">&nbsp;</td>
              </form>
              <form action="modulos/eliminar_cliente.php" method="post">
              <td width="99" class="font-details">ID del Cliente:</td>
              <td width="64"><input name="id_cliente" type="text" class="form-text-costo" id="id_cliente" size="5" maxlength="5" /></td>
              <td width="212"><input name="eliminar_cliente" type="submit" class="form-button" id="eliminar_cliente" value="" /></td>
              </form>
            </tr>
          </table>
          <span class="font-details-min" style="padding-left:5px;"><br/><div id="resultado"></div></span><br />
          <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="185"><span class="font-title">Clientes en Sistema</span></td>
              <td width="565" class="font-details-min-blue"> Mostrando: Últimos 100 Registros (Orden: Descendente por Fecha)</td>
            </tr>
            <tr>
              <td colspan="2" style="padding-top:10px;"><img src="imagenes/linea.png" width="750" height="1" /></td>
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
$clientes=mysql_query("SELECT * FROM tm_clientes ORDER BY id_cliente DESC LIMIT 100",$conexion);
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
