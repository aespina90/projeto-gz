<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');
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
function mostra(campo){ document.getElementById(campo).style.display=''; }
function oculta(campo){ document.getElementById(campo).style.display='none'; }
function MM_openBrWindow(theURL,winName,features){ window.open(theURL,winName,features); }
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
                      <img src="imagens/img_seta.jpg"> Treinamento
                      </p></div><br/>
		    </tr>
                    <tr>
                      <td height="105">
                        <div class="texto_geral"><br/>
                          <p>
                            Preocupada em fornecer a melhor qualifica&ccedil;&atilde;o poss&iacute;vel aos usu&aacute;rios de suas solu&ccedil;&otilde;es disponibilizamos trimestralmente uma agenda de treinamentos em m&oacute;dulos que cobrem toda a nossa linha de produtos e atendem conforme as necessidades de cada usu&aacute;rio:
                          </p><br/>
                          <p>
                            Veja abaixo alguns dos benef&iacute;cios dos treinamentos oferecidos pela GZ Sistemas:
                          </p><br/>
                            <img src="imagens/img_seta.jpg"> Treinamento sem custo, quando in-company <br/>
                            <img src="imagens/img_seta.jpg"> Treinamento por m&oacute;dulo / processo <br/>
                            <img src="imagens/img_seta.jpg"> Treinamento 100% pr&aacute;tico <br/>
                            <img src="imagens/img_seta.jpg"> Mais agilidade no atendimento ao seu cliente <br/>
                            <img src="imagens/img_seta.jpg"> Os usu&aacute;rios passam a ter total seguran&ccedil;a na utiliza&ccedil;&atilde;o do sistema <br/>
                            <img src="imagens/img_seta.jpg"> Relat&oacute;rios com informa&ccedil;&otilde;es corretas e precisas <br/><br/>
                          <p>
                            Saiba operar com precis&atilde;o nossos sistemas, escolha quais as melhores datas de treinamento:
                          </p><br/>
                        </div>
                      </td>
                    </tr>
                  </table>
                  <br/>
                  <table width="775" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <?php
                        $sql_usuario    = 'SELECT * FROM tbtipotreinamento WHERE status = "A" AND tipo = "U" ORDER BY datatreino';
                        $query_usuario  = mysql_query($sql_usuario,$conexao['conexao'])or die(mysql_error());
                        $linhas_usuario = mysql_num_rows($query_usuario);
                        if($linhas_usuario > 0) {       ?>
                           <table width="90%" border="0" cellspacing="0" cellpadding="0">
                             <tr class="texto_geral">
                               <td align="center" colspan="6">
                                 <p style="font-size:15px;">
                                 <strong>Usuário Final</strong></p>
                               </td>
                             </tr>
                             <tr>
                               <td>&nbsp;</td>
                             </tr>
                             <tr class="texto_geral">
                               <td>&nbsp;&nbsp;&nbsp;</td>
                               <td style="width:350px;" align="center"><strong>Nome do Treinamento</strong></td>
                               <td style="width:140px;" align="center"><strong>Data/Horário</strong></td>
                               <td style="width:80px;" align="center"><strong>&nbsp;</strong></td>
                               <td style="width:80px;" align="center"><strong>&nbsp;</strong></td>
                             </tr>
                             <?php
                             for($u=0; $u<$linhas_usuario; $u++){
                                 $dados_usuario = mysql_fetch_array($query_usuario);    ?>
                                 <tr class="texto_geral">
                                   <td>&nbsp;&nbsp;&nbsp;</td>
                                   <td style="width:350px;"><?php echo $dados_usuario['nome'];?>&nbsp;</td>
                                   <td style="width:140px;" align="center"><?php echo fun_tratamento_data($dados_usuario['datatreino'],'L');?></td>
                                   <td style="width:80px;" align="center"><a href='javascript:MM_openBrWindow("conteudo_treinamento.php?id=<?php echo $dados_usuario['id'];?>&amp;tipo=U","Conteúdo","width=385,height=210,scrollbars=yes")'><u>Conteúdo</u></a></td>
                                   <td style="width:80px;" align="center"><a href="inscrevase.php?id=<?php echo $dados_usuario['id'];?>&amp;tipo=U"><u>Inscreva-se</u></a></td>
				 </tr>
				<?php
			      } ?>
                           </table><br/><br/>
                           <?php
                        }       ?>
                      </td>
                    </tr>
                  </table>

                  <?php
                  $sql_treinamento    = 'SELECT * FROM tbtipotreinamento WHERE status = "A" AND tipo = "R" ORDER BY datatreino';
                  $query_treinamento  = mysql_query($sql_treinamento,$conexao['conexao'])or die(mysql_error());
                  $linhas_treinamento = mysql_num_rows($query_treinamento);
                  if($linhas_treinamento > 0){  ?>
                     <table width="90%" border="0" cellspacing="0" cellpadding="0">
                       <tr class="texto_geral">
                         <td align="center" colspan="6">
                           <p style="font-size:15px;">
                           <strong>Revenda</strong></p>
                         </td>
                       </tr>
                       <tr>
                         <td>&nbsp;</td>
                       </tr>
		       <tr class="texto_geral">
                         <td>&nbsp;&nbsp;&nbsp;</td>
                         <td style="width:350px;" align="center"><strong>Nome do Treinamento</strong></td>
                         <td style="width:140px;" align="center"><strong>Data/Horário</strong></td>
                         <td style="width:80px;" align="center"><strong>&nbsp;</strong></td>
                         <td style="width:80px;" align="center"><strong>&nbsp;</strong></td>
                       </tr>
                       <?php
                       for($cont=0; $cont<$linhas_treinamento; $cont++){
                           $dados_treinamento = mysql_fetch_assoc($query_treinamento);  ?>
			   <tr class="texto_geral">
                             <td>&nbsp;&nbsp;&nbsp;</td>
                             <td style="width:350px;"><?php echo $dados_treinamento['nome'];?>&nbsp;</td>
                             <td style="width:140px;" align="center"><?php echo fun_tratamento_data($dados_treinamento['datatreino'],'L');?></td>
                             <td style="width:80px;" align="center"><a href='javascript:MM_openBrWindow("conteudo_treinamento.php?id=<?php echo $dados_treinamento['id'];?>&amp;tipo=R","Conteúdo","width=385,height=210,scrollbars=yes")'><u>Conteúdo</u></a></td>
                             <td style="width:80px;" align="center"><a href="inscrevase.php?id=<?php echo $dados_treinamento['id'];?>&amp;tipo=R"><u>Inscreva-se</u></a></td>
                           </tr>
                           <?php
                        } ?>
                      </table>
                      <?php } ?>
                      <table width="90%" border="0" cellspacing="0" cellpadding="0">
                        <td align="center">
                          <div class="texto_geral">
                            <p>
                              Para outras datas e conteúdos solicitar através do e-mail
                              <a href="mailto:treinamento@gzsistemas.com.br;">
                                 <strong>treinamento@gzsistemas.com.br</strong>
                              </a>
                            </p>
		          </div>
		        </td>
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