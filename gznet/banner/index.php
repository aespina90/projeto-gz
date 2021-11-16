<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.: Reatos - Painel Administrativo :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

  <link rel="stylesheet" href="jquery.tabs.css" type="text/css" media="print, projection, screen">
        <!-- Additional IE/Win specific style sheet (Conditional Comments) -->
        <!--[if lte IE 7]>
        <link rel="stylesheet" href="jquery.tabs-ie.css" type="text/css" media="projection, screen">
        <![endif]-->
        <style type="text/css" media="screen, projection">

            /* Not required for Tabs, just to make this demo look better... */

            body {
                font-size: 16px; /* @ EOMB */
            }
            * html body {
                font-size: 100%; /* @ IE */
            }
            body * {
                font-size: 87.5%;
                font-family: "Trebuchet MS", Trebuchet, Verdana, Helvetica, Arial, sans-serif;
            }
            body * * {
                font-size: 100%;
            }
            h1 {
                margin: 1em 0 1.5em;
                font-size: 18px;
            }
            h2 {
                margin: 2em 0 1.5em;
                font-size: 16px;
            }
            p {
                margin: 0;
            }
            pre, pre+p, p+p {
                margin: 1em 0 0;
            }
            code {
                font-family: "Courier New", Courier, monospace;
            }
.style2 {font-size: 12px; color: #FF0000;}
        </style>
</head>
<body bgcolor="#FFFFFF">
<table width="700" height="350" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="388" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="11"><img src="imagens/1.gif" width="11" height="11"></td>
        <td width="363" style="background-image:url(imagens/6.gif); background-repeat:repeat-x; height: 11px"></td>
        <td width="11" align="right"><img src="imagens/2.gif" width="11" height="11"></td>
      </tr>
    </table>
      <table width="388" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="14" style="background-image:url(imagens/5.gif); background-repeat:repeat-y; height: 11px"></td>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="40%" align="center"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #990000; font-weight: bold"><img src="imagens/logo.gif" width="80" height="78"></span></td>
              <td width="60%" align="center"><p style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #990000; font-weight: bold"><br>
                  <img src="imagens/cad.jpg" width="95" height="120"><br>
                <br>
              </p>
                <p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">&nbsp;</p>                </td>
            </tr>
            <tr>
              <td colspan="2"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px"><strong>Informe seu login e senha:</strong></span></td>
              </tr>
          </table>
            <form style="margin: Opx" name="theform" action="logar.php" method="post" onSubmit="return valid()">
              <table style="margin-top: 4px" width="83%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="23%" align="right"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold">Login:</span></td>
                  <td width="77%" align="center"><label>
                    <input type="text" name="login" id="login">
                  </label></td>
                </tr>
                <tr>
                  <td align="right"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold">Senha:</span></td>
                  <td align="center"><input style="margin-top: 2px" type="password" name="senha" id="senha"></td>
                </tr>
                <?php if($_GET['accessykey'] == "error"){?>
                <tr>
                  <td>&nbsp;</td>
                  <td align="center" class="style2">O nome de usuário e senha digitados são incorretos.</td>
                </tr>
                <?php } ?>
                <tr>
                  <td>&nbsp;</td>
                  <td align="center"><input style="margin-top: 4px; background:#990000; color:#FFFFFF; border: 1px solid #000000; font-family:Arial, Helvetica, sans-serif; font-size: 12px; width: 55px; height: 25px" type="submit" name="button" id="button" value="Entrar"></td>
                </tr>
              </table>
            </form>
          </td>
          <td width="10" style="background-image:url(imagens/5.gif); background-repeat:repeat-y; background-position:right; height: 11px">&nbsp;</td>
        </tr>
      </table>
      <table width="388" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="11"><img src="imagens/3.gif" width="11" height="11"></td>
          <td width="363" valign="bottom" style="background-image:url(imagens/6.gif); background-repeat:repeat-x; background-position:bottom; height: 11px"></td>
          <td width="11" align="right"><img src="imagens/4.gif" width="11" height="11"></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
