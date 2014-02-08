<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Denario : Inicio</title>
<link rel="stylesheet" href="css/css.css" type="text/css">
<?php include 'scripts/conexion.php'; ?>
</head>

<body>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background-image:url(imagenes/bg-login.png); background-repeat:repeat-x; background-position:center top;"><br />
    <br />
    <br />
    <br />
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><img src="imagenes/logo-principal.png" width="309" height="151" /></td>
      </tr>
    </table>
    <br />
    <br />
    <br />
    <form action="caja.php" method="post">
    <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3"><span class="login-title">Iniciar Sesión en el Sistema</span></td>
        </tr>
      <tr>
        <td width="243"><input name="usuario" type="text" class="form-text" id="usuario" value="Ingrese el Usuario" onclick="this.value=''" /></td>
        <td width="243"><input name="password" class="form-text" id="password" value="Contraseña" onclick="this.value=''; type='password'" onfocus="this.value=''; type='password'"/></td>
        <td width="64"><input type="submit" name="login" id="login" value="" class="form-button" title="Iniciar Sesión en el Sistema"/></td>
      </tr>
    </table>
    </form>
    <br />
    <br />
    <br />
    <br />
    <br />
<br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" class="bottom-text">2013 © Todos los Derechos Reservados.</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>