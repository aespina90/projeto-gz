<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');

$id_estado      = rtrim(ltrim(str_replace("'","",$_REQUEST['id'])));
$id_estado      = ereg_replace("[^a-zA-Z0-9_.@]", "",strtr($id_estado, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ","aaaaeeiooouucAAAAEEIOOOUUC_"));
$id_estado      = substr($id_estado,0,2);

$sql_revenda    = 'SELECT * FROM tbrevendas WHERE estado = "'.$id_estado.'" AND status = "A" ORDER BY nome_fantasia';
$query_revenda  = mysql_query($sql_revenda,$conexao['conexao'])or die(mysql_error());
$linhas_revenda = mysql_num_rows($query_revenda);

$sql_estado     = 'SELECT * FROM tbestados WHERE sigla = "'.$id_estado.'"';
$query_estado   = mysql_query($sql_estado,$conexao['conexao'])or die(mysql_error());
$dados_estado   = mysql_fetch_array($query_estado);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script type="text/javascript" src="funcoes.js"></script>
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
function mostra(campo){
    document.getElementById(campo).style.display='';
}
function oculta(campo){
    document.getElementById(campo).style.display='none';
}

</script>
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
                <td width="775" align="center" valign="top"> <br>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> Revendas - <?=$dados_estado['estado'];?>
                      </p></div><br/>
                    </tr>
                    <?php
                    if($linhas_revenda > 0) {
                       for($cont=0; $cont<$linhas_revenda; $cont++){
                          $dados_revenda = mysql_fetch_array($query_revenda);
                          $sql_imagem    = 'SELECT arquivo FROM tbletteraimagens WHERE id = "'.$dados_revenda['logo'].'"';
                          $query_imagem  = mysql_query($sql_imagem,$conexao['conexao'])or die(mysql_error());
                          $linhas_imagem = mysql_num_rows($query_imagem);
                          $dados_imagem  = mysql_fetch_array($query_imagem);    ?>
                          <tr>

                            <td height="105" width="300">
                              <div class="texto_geral"><br/>
                                <div class="texto">
                                  <p align="left" style="font: bold 15px Tahoma;">
                                     <?php if($dados_revenda['nome_fantasia'] != ''){ ?><strong><?=$dados_revenda['nome_fantasia'];?></strong><br/><?php } ?>
                                  </p>
                                </div>
                                <?php if($dados_revenda['cidade'] != ''){ ?><strong>Cidade: </strong><?=$dados_revenda['cidade'];?><br/><?php } ?>
                                <?php if($dados_revenda['nome'] != ''){ ?><strong>Nome do Contato: </strong><?=$dados_revenda['nome'];?><br/><?php } ?>
                                <?php if($dados_revenda['email'] != ''){ ?><strong>E-mail: </strong><a href="mailto:<?=$dados_revenda['email'];?>?bcc=vendas@gzsistemas.com.br"><?=$dados_revenda['email'];?></a><br/><?php } ?>
                                <?php if($dados_revenda['telefone'] != ''){ ?><strong>Telefone: </strong><?=$dados_revenda['telefone'];?><br/><?php } ?>
                                <?php if($dados_revenda['site'] != ''){ ?><strong>Site: </strong><a href="<?=$dados_revenda['site'];?>" title="<?=$dados_revenda['nome_fantasia'];?>" alt="<?=$dados_revenda['nome_fantasia'];?>" target="_blank"><?=$dados_revenda['site'];?></a><?php } ?>
                              </div>
                            </td>

                            <?php
                            if($dados_imagem['arquivo'] != '') { ?>
                              <td height="105" align="center">    <?php
                                if($dados_revenda['site'] != '') { ?>
                                   <a href="<?=$dados_revenda['site'];?>" target="_blank"><img src="dbimagens/thumbnail/<?=$dados_imagem['arquivo'];?>" alt="<?=$dados_revenda['nome_fantasia'];?>" title="<?=$dados_revenda['nome_fantasia'];?>" border="0"/></a>  <?php
                                } else {
                                  if($dados_imagem['arquivo'] != '') ?>
                                     <img src="dbimagens/thumbnail/<?=$dados_imagem['arquivo'];?>" alt="<?=$dados_revenda['nome_fantasia'];?>" title="<?=$dados_revenda['nome_fantasia'];?>"/>      <?php
                                } ?>
                              </td>     <?php
                            } ?>

			  </tr>

			  <tr>
                            <td>&nbsp;</td>
                          </tr>   <?php

                       }

                       ?>
                       <td height="10" width="300">
                         <p align="left">
                           <a href="revendas.php">
                             <img src="imagens/mnu_voltar.jpg" alt="Anterior" border="0"/>
                           </a>
                         </p>
                       </td>
                       <?php

                    } else {

                      ?>
                      <tr>
                        <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                          Nenhuma revenda neste estado
                        </p></div><br/>
                        <td height="10" width="300">
                          <p align="left">
                             <a href="revendas.php">
                                <img src="imagens/mnu_voltar.jpg" alt="Anterior" border="0"/>
                             </a>
                          </p>
                        </td>
                      </tr>
                      <?php

                    } ?>

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