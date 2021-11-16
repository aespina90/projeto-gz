<?php
/**
* ./index.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Tela de identificação do usuário.
* :WARNING: não utilizar doctype com o teclado de segurança.. incompatibilidade.
*/

//*** Início da sessão
	session_start() ;

//*** Nível da página
	$default['nivel'] = './' ;

//*** Inclusões:
	// Configurações da aplicação
	require ( $default['nivel'] . 'global.php' ) ;
?>
<html>
<head>
	<title><?php print $backend['titulo'] ; ?></title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" />
	<link href="<?php print $backend['estilo'] ; ?>" rel="stylesheet" type="text/css">
</head>
<body onLoad="document.formLogin.login.focus();">
<table width="100%" height="410" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center">
<?php
//*** Logotipo da aplicação
	if ( $backend['logotipo'] != "" )
	{
		print '<img src="'. $backend['logotipo'] .'" id="backend_img_logo" alt="'. $backend['empresa'] .'"><br>' ;
	}
?>
			<table width="640" height="321" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="middle" background="icones/bg_login.gif">
						<table width="100" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="25">&nbsp;</td>
							</tr>
						</table>
						<table width="550" height="200" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td height="20" colspan="2">
									<font size="1">
									<strong>Por seguran&ccedil;a o sistema automaticamente registra em nossa base de dados todos os acessos a esta p&aacute;gina.</strong>
									<br>Seu IP: <?php print $_SERVER["REMOTE_ADDR"] ; // IP ?>
									Momento do acesso: <?php print date("d/m/Y H:i:s") ; // Display ?>
									</font>
								</td>
							</tr>
							<tr>
							<form name="formLogin" method="post" action="login.php" onsubmit="this.bt_enviar.disabled=true">
								<td width="222" align="center">
									<table width="100" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="20">&nbsp;</td>
										</tr>
									</table>
										<table width="190" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="35"><font class="txt">usu&aacute;rio:&nbsp;</font></td>
<!--											<td><input type="password" name="senha" id="senha" maxlength="16" class="form" style="width: 150px;" onKeyPress="alert('Utilize o teclado virtual para maior segurança');return false;"></td> -->
											<td><input style="width: 150px;" class="form" type="text" name="login" id="login" size="20" maxlength="16"></td>
										</tr>
										<tr>
											<td height="35"><font class="txt">senha:</font></td>

                                                                                        <td><input type="password" name="senha" id="senha" maxlength="16" class="form" style="width: 150px;" ></td>
										</tr>
										<tr align="center" valign="bottom">
											<td height="30" colspan="2">
												<input name="bt_enviar" type="submit" id="Submit" value="Enviar" style="width: 70; height: 20: font-family: tahoma; font-size:8pt">
												<input name="Submit2" type="reset" id="Submit2" value="Cancelar" style="width: 70; height: 20: font-family: tahoma; font-size:8pt">
											</td>
										</tr>
										<tr align="center" valign="bottom">
											<td height="19" colspan="2">&nbsp;</td>
										</tr>
										<tr align="center" valign="bottom">
											<td height="19" colspan="2"><a href="lembrete.php">Esqueci minha senha!</a></td>
										</tr>
									</table>
								</td>
								<td width="328" align="right">
									<table width="100" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="40">&nbsp;</td>
										</tr>
									</table>
									<table width="284" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="20" align="center"><font color="#990000" size="1" face="tahoma">Para sua seguran&ccedil;a, informe sua senha utilizando o teclado.</font></td>
										</tr>
										<tr>
											<td width="284" height="93"><!--<img src="imagens/teclado.gif" width="284" height="93">--></td>
										</tr>
										<tr>
											<td height="40" align="center"><font size="1"> Para digitar mai&uacute;sculas ou caracteres da parte superior do teclado, clique em CAPS LOCK ou SHIFT.</font></td>
										</tr>
									</table>
								</td>
							</form>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<p align=center class="desc">
	<font size="1" face="Tahoma">
	<strong>Melhor visualizado na resolução 1024x768</strong>
	</font>
</p>
<img src="imagens/teclado/spacer.gif" alt="" name="kb" id="kb" width="0" height="0" border="0">
<script language="javascript" src="includes/inc_teclado.js">
	// Chama o teclado de segurança
</script>
<script language="javascript">
	// Atribuição de variável
	sForm='document.formLogin.';
	DefinirCampos("senha%20%A");
	PosicionaTeclado(false);
</script>
</body>
</html>