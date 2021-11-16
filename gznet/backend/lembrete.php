<?php
/**
* ./lembrete.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Envia a senha para o usu�rio.
*/

//*** N�vel da p�gina
	$default['nivel'] = './' ;
	
//*** Inclus�es:
	// Configura��es da aplica��o
	require ( $default['nivel'] . 'global.php' ) ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php print $backend['titulo'] ; ?></title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" />
	<link href="<?php print $backend['estilo'] ; ?>" rel="stylesheet" type="text/css">
	<script language="JavaScript" type="text/JavaScript" src="includes/inc_java.js">
		//*** Include: [inc_java.js]
	</script>
	<script language="javascript">
	//*** Valida��o de formul�rio
		function fVerificaForm(form,evento)
		{
			if (form.login.value=="")
			{
				alert("Aten��o!\nO campo LOGIN deve ser preenchido.");
				form.login.focus();
				return false;
			}
			if (form.email.value=="")
			{
				alert("Aten��o!\nO campo E-MAIL deve ser preenchido.");
				form.email.focus();
				return false;
			}
		}
	</script>
</head>
<body>
<?php
//*** Logotipo da aplica��o
	if ( $backend['logotipo'] != "" )
	{
		print '<p align="center"><img src="'. $backend['logotipo'] .'" id="backend_img_logo" alt="'. $backend['empresa'] .'"></p>' ;
	}
?>
<br>
<form action="includes/inc_lembrete.php" method="post" name="formCadastro" id="formCadastro" onSubmit="return fVerificaForm(this,event);">
  <table width="300" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" align="center">
    <tr> 
      <th colspan="4" align="center" >Lembrete de Senha</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td colspan="4"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td class="txt" width="100" colspan="2">Login:</td>
      <td colspan="2" align="center" > <input name="login" class="form" type="text" id="login" value="" size="30"></td>
    </tr>
   <tr bgcolor="#FFFFFF"> 
      <td class="txt" width="100" colspan="2">E-Mail:</td>
      <td colspan="2" align="center" > <input name="email" class="form" type="text" id="email" value="" size="30"></td>
    </tr>
    <tr bgcolor="#FFFFFF" align="right"> 
      <td colspan="4"> <input name="bt_enviar" type="submit" id="Submit" value="Enviar" style="width: 70; height: 20: font-family: tahoma; font-size:8pt"></td>
   </tr>
  </table>
</form>
<p align=center><a href="index.php">Voltar</a></p>
<!--<?php
//*** Inclus�es:
	// Rodap� da aplica��o
	require ( $include['footer'] ) ;
?>-->
</body>
</html>