<?php
session_start();
$var_id     = $_REQUEST['id'];
$var_pagina = $_REQUEST['pagina'];
$id_secao   = $_REQUEST['id_secao'];
?>
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<link href="css.css" rel="stylesheet" type="text/css">

<script language="JavaScript">
</script>
</head>
<body>
<table width="440" border="0" cellpadding="0" cellspacing="0" class="envie_amigo">
  <tr>
    <td><img src="imagens/topo_indique_amigo.jpg" width="440" height="80" border=0></td>
      </tr>
	<tr>
          <td valign="top">
            <div align="center">
              <br><b>Enviar texto para um amigo:</b>
              <br><br>
              Para enviar o texto para um amigo, por favor preencha os campos abaixo:
              <br><br>
              <table cellpadding="1" cellspacing="1" border="0" class="envie_amigo">
	        <form name="formFale" method="post" action="envie_amigo_obrigado.php" onSubmit="return fVerificaForm(this,event);">
		<input type="hidden" name="id" value="<?php print $var_id ; ?>">
		<input type="hidden" name="pagina" value="<?php print $var_pagina ; ?>">
		<input type="hidden" name="idsecao" value="<?php print $id_secao ; ?>" >
	        <tr>
		  <td colspan="2" align="center" class="texto_preto"><strong>Para enviar a vários e-mails, separe-os por vírgula e espaço.</strong><br><br></td>
	        </tr>
        	<tr>
		  <td align="right"><p>Seu nome: </p></td>
		  <td><input name="nome" type="text" size="35" maxlength="255" ></td>
	        </tr>
	        <tr>
		  <td align="right"><p>Seu e-mail:</p> </td>
		  <td><input name="email" type="text" size="35" maxlength="255" ></td>
	        </tr>
	        <tr>
		  <td align="right"><p>E-mail(s) do(s) destinatário(s):</p> </td>
		  <td><input name="emailamigo" type="text" size="35" maxlength="255" ></td>
        	</tr>
	        <tr>
		  <td align="right" valign="top"><p>Sua mensagem:</p></td>
		  <td><textarea name="mensagem" cols="25" rows="4" ></textarea></td>
	        </tr>
        	<tr>
		  <td valign="top" align="center" colspan="2"><input type="submit" name="Submit" value=" Enviar " style="margin-left:150px;">&nbsp;
		    <input type="reset" name="Reset" value=" Apagar ">
		  </td>
	        </tr>
	        </form>
              </table>
            </div><br><br>
          </td>
	</tr>
      </table>
</body>
</html>