<?php
session_start();
	$var_nomedaempresa 				= Str_Replace ( "'", "´" , $_POST['nomedaempresa'] ) ;
	$var_contato					= Str_Replace ( "'", "´" , $_POST['contato'] ) ;
	$var_cidade						= Str_Replace ( "'", "´" , $_POST['cidade'] ) ;
	$var_estado	 					= Str_Replace ( "'", "´" , $_POST['estado'] ) ;
	$var_telefone					= Str_Replace ( "'", "´" , $_POST['telefone'] ) ;
	$var_email						= Str_Replace ( "'", "´" , $_POST['email'] ) ;
	$var_mensagem1					= Str_Replace ( "'", "´" , $_POST['mensagem1'] ) ;
	$var_mensagem2					= Str_Replace ( "'", "´" , $_POST['mensagem2'] ) ;
	$var_mensagem3					= Str_Replace ( "'", "´" , $_POST['mensagem3'] ) ;
	$var_mensagem4					= Str_Replace ( "'", "´" , $_POST['mensagem4'] ) ;
	$var_mensagem5					= Str_Replace ( "'", "´" , $_POST['mensagem5'] ) ;
	$var_mensagem6					= Str_Replace ( "'", "´" , $_POST['mensagem6'] ) ;
	$var_mensagem7					= Str_Replace ( "'", "´" , $_POST['mensagem7'] ) ;
	$var_mensagem8					= Str_Replace ( "'", "´" , $_POST['mensagem8'] ) ;
	$var_mensagem9					= Str_Replace ( "'", "´" , $_POST['mensagem9'] ) ;
	$var_mensagem10					= Str_Replace ( "'", "´" , $_POST['mensagem10'] ) ;
	$var_mensagem11					= Str_Replace ( "'", "´" , $_POST['mensagem11'] ) ;
	$var_mensagem12					= Str_Replace ( "'", "´" , $_POST['mensagem12'] ) ;
	$var_mensagem13					= Str_Replace ( "'", "´" , $_POST['mensagem13'] ) ;
	$var_mensagem14					= Str_Replace ( "'", "´" , $_POST['mensagem14'] ) ;
	$ip                     = $_SERVER['REMOTE_ADDR'];
	$email_padrao           = "gznet@gznet.com.br";
	$email_envio            = 'vendas@gzsistemas.com.br' ;

	$nCorpoEmail = '<html>
	<head>
		<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas - Novo Revendedor</title>
	</head>
	<body>
	<table>
	<tr>
	<td colspan="2">
	<td align="left"><font face="Verdana" size="4" color="#3E4289"><strong>Novo Revendedor</strong></font></td>
	</tr>
	<tr>
		<td align="left"><font face="Verdana" size="3"><strong>Dados Cadastrais: </strong></font></td>
	</tr>
	<tr>
		<td width="120"><font face="Verdana" size="2"><strong>Nome da Empresa: </strong></font></td>
		<td><font face="Verdana" size="2">'.$var_nomedaempresa.'</font></td>
	</tr>
	<tr>
		<td width="120"><font face="Verdana" size="2"><strong>Pessoa para Contato: </strong></font></td>
		<td><font face="Verdana" size="2">'.$var_contato.'</font></td>
	</tr>
	<tr>
		<td width="120"><font face="Verdana" size="2"><strong>Cidade: </strong></font></td>
		<td><font face="Verdana" size="2">'.$var_cidade.'</font></td>
	</tr>
	<tr>
		<td width="120"><font face="Verdana" size="2"><strong>Estado: </strong></font></td>
		<td><font face="Verdana" size="2">'.$var_estado.'</font></td>
	</tr>
	<tr>
		<td width="120"><font face="Verdana" size="2"><strong>(DDD)Telefone/fax: </strong></font></td>
		<td><font face="Verdana" size="2">'.$var_telefone.'</font></td>
	</tr>
	<tr>
		<td width="120"><font face="Verdana" size="2"><strong>E-mail: </strong></font></td>
		<td><font face="Verdana" size="2">'.$var_email.'</font></td>
	</tr>

	<tr>
       <td colspan="2"><div align="left" class="texto_fomularios"><br/><strong>Estrutura da Empresa</strong></div><br/></td>
    </tr>

	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Identifique seu quadro de funcion&aacute;rios (ex: 2 t&eacute;cnicos de &nbsp;hardware, 2 t&eacute;cnicos de software,...):</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem1.'</font><br/><br/></td>
	</tr>


	<tr>
        <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Identifique seus clientes (com n&uacute;mero) e ramo de atividade:</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem2.'</font><br/><br/></td>
	</tr>


	<tr>
        <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Meio de conex&atilde;o com a Internet:</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem3.'</font><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Qual a disponibilidade para treinamento na GZ Sistemas?</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem4.'</font><br/><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2" align="left"><font face="Verdana" size="3"><br/><strong>Conhecimentos Automa&ccedil;&atilde;o</strong></font><br/></td>
    </tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;O que &eacute; automa&ccedil;&atilde;o comercial?</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem5.'</font><br/><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Voc&ecirc; j&aacute; trabalhou com quais softwares de automa&ccedil;&atilde;o comercial?</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem6.'</font><br/><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;O que comp&otilde;e um PDV? Cite algumas marcas de perif&eacute;ricos<br/>&nbsp;com as quais voc&ecirc; j&aacute; trabalhou.</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem7.'</font><br/><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Quais s&atilde;o os perif&eacute;ricos que podem ser colocados em uma &nbsp;retaguarda? Cite as marcas com as quais voc&ecirc; j&aacute; trabalhou.</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem8.'</font><br/><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;O que &eacute; ECF? Qual a sua import&acirc;ncia?</strong></font></div></td>
    </tr>
	<tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem9.'</font><br/><br/><br/></td>
	</tr>


	<tr>
        <td colspan="2"><div align="left"><font face="Verdana" size="3"><strong>Conhecimentos em Inform&aacute;tica</strong></font></div></td>
    </tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Voc&ecirc; conhece ou j&aacute; trabalhou com quais redes?</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem10.'</font><br/><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Qual seu grau de conhecimento com Windows 2000 e MsClient?</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem11.'</font><br/><br/><br/></td>
	</tr>


	<tr>
        <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;J&aacute; trabalhou ou conhece qual(is) base de dados(s)?</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem12.'</font><br/><br/><br/></td>
	</tr>


	<tr>
        <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Qual seu grau de conhecimentos no ambiente DOS? Cite os &nbsp;arquivos de configura&ccedil;&atilde;o.</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem13.'</font><br/><br/><br/></td>
	</tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="3"><strong><br/><strong>Comentários</strong></font></div></td>
    </tr>


	<tr>
       <td colspan="2"><div align="left"><font face="Verdana" size="2"><strong>&nbsp;Utilize este espa&ccedil;o para acrescentar informa&ccedil;&otilde;es sobre sua &nbsp;empresa.</strong></font></div></td>
    </tr>
	<tr>
		<td colspan="2" align="left"><font face="Verdana" size="2">'.$var_mensagem14.'</font><br/><br/><br/></td>
	</tr>

	</table>
	</body>
	</html>';

	$nEmailResposta = '<html>
	<head>
		<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas - Novo Revendedor</title>
	</head>
	<body>
	<p align="center" style="font-family:verdana;font-color:#204162;font-size:12px;font-weight:bold;">Seu e-mail é muito importante para nós!</p>
	<p align="center">Entraremos em contato breve</p>
	</body>
	</html>';

    if ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'WIN' ))
    {
      $eol="\r\n";
    }
    elseif ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'MAC' ))
    {
      $eol="\r";
    }
    else
    {
      $eol="\n";
    }
 	$headers  = "MIME-Version: 1.0" . $eol;
        $headers .= "Content-type: text/html; charset=iso-8859-1" . $eol;
	$headers .= "From: [GZ Sistemas] <contato@gzsistemas.com.br>".$eol;

	mail($email_envio,"[GZ Sistemas] Novo Revendedor (".$ip.")" ,$nCorpoEmail,$headers);
	mail($email_padrao,"[GZ Sistemas] Novo Revendedor (".$ip.")",$nCorpoEmail,$headers);
	mail($var_email,"[GZ Sistemas] Novo Revendedor",$nEmailResposta,$headers);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script type="text/javascript">
   setTimeout("history.back()",3000)
</script>

<link rel="stylesheet" href="css.css" type="text/css"/>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="resource-type" content="document"/>
    <meta http-equiv="Expires" content="-1"/>
	<meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT"/>
	<meta name="revisit-after" content="10"/>
<meta name="classification" content="Site Venda de Sistemas"/>
<meta name="description" content="Software de automação comercial, frente de loja e retaguarda.TEF. Consultoria para supermercados. Equipamentos em geral. Computadores, no-breaks, impressoras fiscais"/>
<meta name="keywords" content="Sistema comercial, software, tef, ecf, mfd, frente de loja, retaguarda, consultoria, computador, impressoras fiscais, no-breaks, leitores, periféricos, equipamentos de informatica, microterminal, programas, ti, tecnologia de informação."/>
	<meta name="robots" content="ALL"/>
	<meta name="googlebot" content="INDEX, FOLLOW"/>
	<meta name="distribution" content="Global"/>
	<meta name="rating" content="General"/>
	<meta name="copyright" content="Copyright 2006 - Lógica Digital"/>
	<meta name="author" content="Lógica Digital"/>
	<meta http-equiv="reply-to" content="root@gznet.com.br"/>
    <meta http-equiv="Content-Language" content="pt-BR"/>
	<meta name="target_country" content="br"/>
	<meta name="country" content="Brazil"/>

</head>

<body>

<!--inicio da tabela geral-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
  <tr>
    <td align="center" valign="top">
	  <!--inicio da tabela principal-->
      <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>

          <td align="center" valign="top">
            <!--inicio da tabela do Topo-->
            <?php include("inc_topo.php"); ?>
            <!--inicio da tabela meio-->
            <table width="775" border="0" cellspacing="0" cellpadding="0">
				<tr>

                <td width="775" height="586" align="center" valign="top"> <br>
				    <table width="90%" border="0" cellspacing="0" cellpadding="0" class="interna">
					<tr>
                        <td colspan="2" class="texto_fomularios" valign="top"><br/><p><strong>Formul&aacute;rio de Avalia&ccedil;&atilde;o Novo Revendedor</strong></p><br/></td>
                      </tr>

					  <tr>
					  <td><br><div class="texto_geral">
					  		<p>Sua mensagem foi enviada com sucesso, e logo ela será analisada
                     			por nossa equipe.</p>
                    		<p>Você será redirecionado para a página que estava anteriormente.
                      			Se isso não acontecer, <strong><a href="javascript:history.go(-1)">clique
                      			aqui</a></strong>.</p>
					 </div></td>
					  </tr>
					</table>
				</td>

				   </tr>
			       </table>

			<!--inicio do rodape-->
			 <?php include("inc_rodape.php"); ?>

            <!--fim da tabela principal-->
          </td>
		  </tr>
		</table>

      <!--fim da tabela geral-->
    </td>
  </tr>
</table>

</body>
</html>
