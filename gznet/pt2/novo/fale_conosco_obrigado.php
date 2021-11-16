<?php
session_start();

$var_nome               = Str_Replace ( "'", "´" , $_POST['nome'] ) ;
$var_empresa            = Str_Replace ( "'", "´" , $_POST['empresa'] ) ;
$var_email              = Str_Replace ( "'", "´" , $_POST['email'] ) ;
$var_telefone           = Str_Replace ( "'", "´" , $_POST['telefone'] ) ;
$var_cidade             = Str_Replace ( "'", "´" , $_POST['cidade'] ) ;
$var_estado             = Str_Replace ( "'", "´" , $_POST['estado'] ) ;
$var_mensagem           = Str_Replace ( "'", "´" , $_POST['mensagem'] ) ;
$var_interesse          = Str_Replace ( "'", "´" , $_POST['interesse'] ) ;
$var_usrlogin           = Str_Replace ( "'", "´" , $_POST['usrlogin'] ) ;
$var_usrsenha           = Str_Replace ( "'", "´" , $_POST['usrsenha'] ) ;
$ip                     = $_SERVER['REMOTE_ADDR'];
$email_padrao           = "gznet@gznet.com.br";

if ( $var_interesse == 'Administra&ccedil;&atilde;o/Financeiro' ) {
   $envio_email = 'adm@gzsistemas.com.br' ;
}

if ( $var_interesse == 'Comercial' ) {
   $envio_email = 'vendas@gzsistemas.com.br' ;
}

if ( $var_interesse == 'Senha para &Aacute;rea Restrita' ) {
   $envio_email = 'treinamento@gzsistemas.com.br' ;
}

if ( $var_interesse == 'Service Desk' ) {
   $envio_email = 'suporte@gzsistemas.com.br' ;
}

if ( $var_interesse == 'Assist&ecirc;ncia T&eacute;cnica' ) {
   $envio_email = 'tecnica@gzsistemas.com.br' ;
}

if ( $var_interesse == 'An&aacute;lise' ) {
   $envio_email = 'analise@gzsistemas.com.br' ;
}

if ( $var_interesse == 'Treinamento' ) {
   $envio_email = 'treinamento@gzsistemas.com.br' ;
}

if ( $var_interesse == 'TEF' ) {
   $envio_email = 'tef@gzsistemas.com.br' ;
}

if ( $var_interesse == 'Contato' ) {
   $envio_email = 'contato@gzsistemas.com.br' ;
}
$nCorpoEmail = '
        <html>
        <head>
	  <LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas - Fale Conosco</title>
        </head>
        <body>
        <table>
          <tr>
	    <td>&nbsp;</td>
	    <td><font face="Verdana" size="2"><strong>Dados Pessoais: </strong></font></td>
          </tr>
          <tr>
	    <td width="120"><font face="Verdana" size="2"><strong>Nome: </strong></font></td>
	    <td><font face="Verdana" size="2">'.$var_nome.'</font></td>
          </tr>
          <tr>
	    <td><font face="Verdana" size="2"><strong>Empresa: </strong></font></td>
            <td><font face="Verdana" size="2">'.$var_empresa.'</font></td>
          </tr>
          <tr>
            <td><font face="Verdana" size="2"><strong>E-mail: </strong></font></td>
            <td><font face="Verdana" size="2">'.$var_email.'</font></td>
          </tr>
          <tr>
            <td><font face="Verdana" size="2"><strong>Telefone: </strong></font></td>
            <td><font face="Verdana" size="2">'.$var_telefone.'</font></td>
          </tr>
          <tr>
            <td><font face="Verdana" size="2"><strong>Cidade: </strong></font></td>
            <td colspan="2"><font face="Verdana" size="2">'.$var_cidade.'</font></td>
          </tr>
          <tr>
            <td><font face="Verdana" size="2"><strong>Estado: </strong></font></td>
            <td colspan="2"><font face="Verdana" size="2">'.$var_estado.'</font></td>
          </tr>';

if ( $var_interesse == 'Senha' ) {

        $nCorpoEmail .= '
          <tr>
            <td><font face="Verdana" size="2"><strong>Login: </strong></font></td>
            <td colspan="2"><font face="Verdana" size="2">'.$var_usrlogin.'</font></td>
          </tr>
          <tr>
            <td><font face="Verdana" size="2"><strong>Senha: </strong></font></td>
            <td colspan="2"><font face="Verdana" size="2">'.$var_usrsenha.'</font></td>
          </tr>';

}

$nCorpoEmail .= '
          <tr>
            <td><font face="Verdana" size="2"><strong>Mensagem: </strong></font></td>
            <td colspan="2"><font face="Verdana" size="2">'.$var_mensagem.'</font></td>
          </tr>
        </table>
        </body>
        </html>';

$nEmailResposta = '
        <html>
        <head>
	  <LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas - Fale Conosco</title>
        </head>
        <body>
        <p align="center" style="font-family:verdana;font-color:#204162;font-size:12px;font-weight:bold;">Seu e-mail é muito importante para nós!</p>
        <p align="center">Entraremos em contato breve</p>
        </body>
        </html>';

if ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'WIN' ))      {$eol="\r\n";}
elseif ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'MAC' ))  {$eol="\r";}
else                                                         {$eol="\n";}

$headers  = "MIME-Version: 1.0" . $eol;
$headers .= "Content-type: text/html; charset=iso-8859-1" . $eol;
$headers .= "From: [GZ Sistemas] <contato@gzsistemas.com.br>".$eol;

mail($envio_email ,"[GZ Sistemas] Fale Conosco (".$ip.")",$nCorpoEmail,$headers);
mail($email_padrao,"[GZ Sistemas] Fale Conosco (".$ip.")",$nCorpoEmail,$headers);
mail($var_email   ,"[GZ Sistemas] Fale Conosco"          ,$nEmailResposta,$headers);

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
      <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="center" valign="top">
            <?php include("inc_topo.php"); ?>
            <table width="775" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="527" height="586" align="center" valign="top"> <br>
                  <table width="437" border="0" cellspacing="0" cellpadding="0" class="interna">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> Fale Conosco
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td>
                        <br><div class="texto_geral">
                        <p>Sua mensagem foi enviada com sucesso, e logo ela será analisada
                     	   por nossa equipe.
                     	</p>
                        <p>Você será redirecionado para a página que estava anteriormente.
                      	   Se isso não acontecer, <strong><a href="javascript:history.go(-1)">
                      	   clique aqui</a></strong>.
                      	</p></div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <?php include("inc_rodape.php"); ?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
