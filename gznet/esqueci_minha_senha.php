<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');

$login = rtrim(ltrim(str_replace("'","",$_REQUEST['login'])));
$login = ereg_replace("[^a-zA-Z0-9_.@]", "",strtr($login, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ","aaaaeeiooouucAAAAEEIOOOUUC_"));

$sql_esqueci    = 'SELECT * FROM tbarearestrita WHERE login = "'.$login.'" AND status = "A"';
$query_esqueci  = mysql_query($sql_esqueci,$conexao['conexao'])or die(mysql_error());
$linhas_esqueci = mysql_num_rows($query_esqueci);

$email_padrao   = "gznet@gznet.com.br";

if($linhas_esqueci > 0){

   $dados_esqueci = mysql_fetch_array($query_esqueci);

   if( strlen(rtrim($dados_esqueci['email'])) == 0  ) {

     $msg = 'O login informado não possui email cadastrado.<br><br>';
     $msg.= '</p><p align="center" style="font: bold 18px Tahoma;">';
     $msg.= 'Envie uma nova solicitação de senha contendo todos os seus dados, inclusive o ';
     $msg.= 'email, assim você poderá utilizar esse novo recurso.';

   } else {

     $corpoemail    = '
   	<html>
   	<head>
   	  <LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas - Esqueci minha senha</title>
   	  <style type="text/css">body { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; }</style>
   	</head>
   	<body>
   	<table>
   	  <tr>
   	    <td colspan="2"><font face=verdana size=2 color=#6F9DCE><strong>Este email foi enviado para lembrá-lo de sua senha</strong></font></td>
   	  </tr>
   	  <tr>
   	    <td colspan="2">&nbsp;</td>
   	  </tr>
   	  <tr>
   	    <td><font face=verdana size=2 color=#27377F><strong>Login: </strong></font></td>
   	    <td><font face=verdana size=2 color=#000000>'.$login.'</font></td>
   	  </tr>
   	  <tr>
   	     <td><font face=verdana size=2 color=#27377F><strong>Senha: </strong></font></td>
   	     <td><font face=verdana size=2 color=#000000>'.$dados_esqueci['senha'].'</font></td>
   	  </tr>
   	</table>
   	</body>
   	</html>';

     if(strtoupper(substr(PHP_OS,0,3) == 'WIN'))        { $eol="\r\n"; }
     elseif(strtoupper(substr(PHP_OS,0,3) == 'MAC'))    { $eol="\r"; }
     else                                               { $eol="\n"; }

     $headers  = "MIME-Version: 1.0".$eol;
     $headers .= "Content-type: text/html; charset=iso-8859-1".$eol;
     $headers .= "From: [GZ Sistemas] <contato@gzsistemas.com.br>".$eol;
     mail($dados_esqueci['email'],"[GZ Sistemas] Esqueci minha senha",$corpoemail,$headers);
     mail($email_padrao,"[GZ Sistemas] Esqueci minha senha",$corpoemail,$headers);

     $msg = 'Sua senha foi enviada para o email cadastrado.';
   }

} else {

  $msg = 'Login informado não cadastrado ou incorreto';
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script type="text/javascript" src="funcoes.js"></script>
<script type="text/javascript">setTimeout("history.back()",8000)</script>
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
<script language="JavaScript">

function mostra(campo) {
    document.getElementById(campo).style.display='' ;
}
function oculta(campo) {
    document.getElementById(campo).style.display='none' ;
}

</script>
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
                <td width="775" height="586" align="center" valign="top"> <br>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> Esqueci minha senha
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105">
                      <div class="texto_geral"><br>
                        <p align="center" style="font: bold 25px Tahoma;">
                          <strong>
                            <?php echo $msg?>
                          </strong><br><br><br><br>
                        </p>
                      </div></td>
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
