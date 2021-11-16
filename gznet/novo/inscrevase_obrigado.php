<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');

$id                = $_REQUEST['id'];
$tipo              = $_REQUEST['tipo'];
$qtd_participantes = $_REQUEST['qtd_participantes'];
$email_padrao      = "gznet@gznet.com.br";

$id     = ereg_replace("[^0-9.]", "",$id);
$tipo   = substr($tipo,0,1);

$sql_inscreva    = 'SELECT * FROM tbtipotreinamento WHERE status = "A" AND tipo = "'.$tipo.'" AND id = "'.$id.'"';
$query_inscreva  = mysql_query($sql_inscreva,$conexao['conexao'])or die(mysql_error());
$linhas_inscreva = mysql_num_rows($query_inscreva);

if($linhas_inscreva > 0) { $dados_inscreva = mysql_fetch_array($query_inscreva); }

$nome         = $dados_inscreva['nome'];
$datatreino   = fun_tratamento_data($dados_inscreva['datatreino'],'L');
$razao_social = Str_Replace("'","´",$_REQUEST['razao_social']);
$cnpj         = Str_Replace("'","´",$_REQUEST['cnpj']);
$email        = Str_Replace("'","´",$_REQUEST['email']);

$sql_insere   = 'INSERT INTO tbtreinamentos(id_treinamento, nome_treinamento, qtd_participantes, datatreino, razao_social, cnpj, email, status, datacadastro)VALUES("'.$id.'", "'.$nome.'", "'.$qtd_participantes.'", "'.$dados_inscreva['datatreino'].'", "'.$razao_social.'", "'.$cnpj.'", "'.$email.'", "A", NOW())';
$query_insere = mysql_query($sql_insere,$conexao['conexao'])or die(mysql_error());

for($cont=0; $cont<$qtd_participantes; $cont++){
   $participante = Str_Replace("'","´",$_REQUEST['participante_'.$cont]);
   $cpf          = Str_Replace("'","´",$_REQUEST['cpf_'.$cont]);
   $rg           = Str_Replace("'","´",$_REQUEST['rg_'.$cont]);
   $sql_treino   = 'SELECT * FROM tbtreinamentos WHERE status = "A" AND id_treinamento = "'.$id.'"';
   $query_treino = mysql_query($sql_treino,$conexao['conexao'])or die(mysql_error());
   $dados_treino = mysql_fetch_array($query_treino);
   $sql_insert   = 'INSERT INTO tbtreinamentosaux(id_treino, id_treinamento, participante, cpf, rg) VALUES("'.$dados_treino['id'].'", "'.$id.'", "'.$participante.'", "'.$cpf.'", "'.$rg.'")';
   $query_insert = mysql_query($sql_insert,$conexao['conexao'])or die(mysql_error());
}

$nCorpoEmail = '

  <html>
  <head>
    <LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas - Treinamento</title>
  </head>
  <body>
  <table>
  <tr>
    <td width="200" align="right"><font face="Verdana" size="2"><strong>Nome do Treinamento: </strong></font></td>
    <td><font face="Verdana" size="2">'.$nome.'</font></td>
  </tr>
  <tr>
    <td align="right"><font face="Verdana" size="2"><strong>Data/Horário: </strong></font></td>
    <td><font face="Verdana" size="2">'.$datatreino.'</font></td>
  </tr>
  <tr>
    <td align="right"><font face="Verdana" size="2"><strong>Razão Social: </strong></font></td>
    <td><font face="Verdana" size="2">'.$razao_social.'</font></td>
  </tr>
  <tr>
    <td align="right"><font face="Verdana" size="2"><strong>CNPJ: </strong></font></td>
    <td><font face="Verdana" size="2">'.$cnpj.'</font></td>
  </tr>';

  for($cont=0; $cont<$qtd_participantes; $cont++){
  	$nCorpoEmail .= '
  	<tr>
  	  <td align="right"><font face="Verdana" size="2"><strong>'.($cont+1).'º Participante: </strong></font></td>
  	  <td><font face="Verdana" size="2">'.$_REQUEST['participante_'.$cont].'</font></td>
  	</tr>
  	<tr>
  	  <td align="right"><font face="Verdana" size="2"><strong>CPF: </strong></font></td>
  	  <td><font face="Verdana" size="2">'.$_REQUEST['cpf_'.$cont].'</font></td>
  	</tr>
  	<tr>
  	  <td align="right"><font face="Verdana" size="2"><strong>RG: </strong></font></td>
  	  <td><font face="Verdana" size="2">'.$_REQUEST['rg_'.$cont].'</font></td>
  	</tr>';
  }

  $nCorpoEmail .= '
  <tr>
    <td align="right"><font face="Verdana" size="2"><strong>E-mail: </strong></font></td>
    <td colspan="2"><font face="Verdana" size="2">'.$email.'</font></td>
  </tr>
  </table>
  </body>
  </html>';

  if(strtoupper(substr(PHP_OS,0,3) == 'WIN')){ $eol="\r\n"; }
  elseif(strtoupper(substr(PHP_OS,0,3) == 'MAC')){ $eol="\r"; }
  else{ $eol="\n"; }

  $headers  = "MIME-Version: 1.0".$eol;
  $headers .= "Content-type: text/html; charset=iso-8859-1".$eol;
  $headers .= "From: [GZ Sistemas] <contato@gzsistemas.com.br>".$eol;

  mail("treinamento@gzsistemas.com.br","[GZ Sistemas] Treinamento",$nCorpoEmail,$headers);
  mail($email_padrao,"[GZ Sistemas] Treinamento",$nCorpoEmail,$headers);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script type="text/javascript">setTimeout("history.back()",3000)</script>
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
                      <img src="imagens/img_seta.jpg"> Treinamento - Inscrição
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td><br/>
                        <div class="texto_geral">
                          <p>
                            Sua cadastro foi feito com sucesso, e será analisada por nossa equipe.
                          </p>
                          <p>
                            Você será redirecionado para a página que estava anteriormente. Se isso não acontecer, <strong><a href="javascript:history.go(-1)">clique aqui</a></strong>.
                          </p>
                        </div>
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