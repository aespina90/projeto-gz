<?php
session_start();
require ('inc_conexao_interno.php');
require ('inc_funcoes.php');

$pagina   = 'noticias_interno';

$id       = rtrim(ltrim(str_replace("'","",$_REQUEST['id'])));
$id_secao = rtrim(ltrim(str_replace("'","",$_REQUEST['id_secao'])));

$id       = ereg_replace("[^0-9.]", "",$id);
$id_secao = ereg_replace("[^0-9.]", "",$id_secao);

$rs_sql = 'SELECT * FROM tblettera
           WHERE idsecao = ' .$id_secao. ' AND id='.$id.' AND status = "A" AND ( datapublicacao < NOW() AND ( dataexpiracao > NOW() OR expirar = "N" ) )
           ORDER BY datapublicacao DESC, assunto ASC';

$rs_query    = mysql_query ($rs_sql);
$rs_num_rows = mysql_num_rows ($rs_query);
$rs_dados    = mysql_fetch_array ($rs_query);

$rs_sql_imagem      = 'SELECT * FROM tbletteraimagens WHERE id="'.$rs_dados['idimagem'].'"';
$rs_query_imagem    = mysql_query ($rs_sql_imagem);
$rs_num_rows_imagem = mysql_num_rows ($rs_query_imagem);
$rs_imagem          = mysql_fetch_array ($rs_query_imagem);

$rs_sql_imagem1     = 'SELECT * FROM tbletteraimagens WHERE id="'.$rs_dados['idimagemnoticia1'].'"';
$rs_query_imagem1   = mysql_query ($rs_sql_imagem1);
$rs_num_rows_imagem1= mysql_num_rows ($rs_query_imagem1);
$rs_imagem1         = mysql_fetch_array ($rs_query_imagem1);

$rs_sql_imagem2     = 'SELECT * FROM tbletteraimagens WHERE id="'.$rs_dados['idimagemnoticia2'].'"';
$rs_query_imagem2   = mysql_query ($rs_sql_imagem2);
$rs_num_rows_imagem2= mysql_num_rows ($rs_query_imagem2);
$rs_imagem2         = mysql_fetch_array ($rs_query_imagem2);

$rs_sql_imagem3     = 'SELECT * FROM tbletteraimagens WHERE id="'.$rs_dados['idimagemnoticia3'].'"';
$rs_query_imagem3   = mysql_query ($rs_sql_imagem3);
$rs_num_rows_imagem3= mysql_num_rows ($rs_query_imagem3);
$rs_imagem3         = mysql_fetch_array ($rs_query_imagem3);

$rs_sql_imagem4     = 'SELECT * FROM tbletteraimagens WHERE id="'.$rs_dados['idimagemnoticia4'].'"';
$rs_query_imagem4   = mysql_query ($rs_sql_imagem4);
$rs_num_rows_imagem4= mysql_num_rows ($rs_query_imagem4);
$rs_imagem4         = mysql_fetch_array ($rs_query_imagem4);

if ($rs_num_rows>0) {

   ?>

   <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
   <html>
   <script language="JavaScript">
   function MM_openBrWindow(theURL,winName,features) { //v2.0
     window.open(theURL,winName,features);
   }
   </script>
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
   function mostra(campo) {
       document.getElementById(campo).style.display='' ;
   }
   function oculta(campo) {
       document.getElementById(campo).style.display='none' ;
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
                   <td width="775" height="597" align="center" valign="top"> <br>
                     <table width="90%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                         <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                         <img src="imagens/img_seta.jpg"> Noticias
                         </p></div><br/>
                         <div class="texto_geral_titulo"><?=$rs_dados['assunto'];?></div>
                       </tr>
                       <tr>
                         <td height="105"><br>
                           <div class="texto_geral"><br>
                             <?php
                             if($rs_num_rows_imagem > 0) { ?>
                               <?php
                               if($rs_dados['fontelink'] != '') { ?>
                                  <a href="<?=$rs_dados['fontelink'];?>" target="_blank"> <?php
                               } ?>

                               <img src="dbimagens/thumbnail/<?=$rs_imagem['arquivo'];?>" class="img_noticias">
                               <p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                                 <?=$rs_dados['lead'];?>
                               </p>

                               <?php
                               if($rs_dados['fontelink'] != '') { ?>
                                  </a> <?php
                               } ?>

                               <br/><br/><br/><br/><br/><br/>
                             <?php } ?>
                             <br>
                             <?=$rs_dados['materia'];?>
                             <br>

                             <?php
                             if($rs_num_rows_imagem1 > 0) { ?>
                               <a href="#" onClick="fnImagemPopUp( 'Noticia' , 800 , 600 , 'dbimagens/<?=$rs_imagem1['arquivo'];?>' , 'Tela' );">
                               <img src="dbimagens/thumbnail/<?=$rs_imagem1['arquivo'];?>" width="150" class="img_noticias">
                               <?php
                             } ?>
                             <?php
                             if($rs_num_rows_imagem2 > 0) { ?>
                               <a href="#" onClick="fnImagemPopUp( 'Noticia' , 800 , 600 , 'dbimagens/<?=$rs_imagem2['arquivo'];?>' , 'Tela' );">
                               <img src="dbimagens/thumbnail/<?=$rs_imagem2['arquivo'];?>" width="150" class="img_noticias">
                               <?php
                             } ?>
                             <?php
                             if($rs_num_rows_imagem3 > 0) { ?>
                               <a href="#" onClick="fnImagemPopUp( 'Noticia' , 800 , 600 , 'dbimagens/<?=$rs_imagem3['arquivo'];?>' , 'Tela' );">
                               <img src="dbimagens/thumbnail/<?=$rs_imagem3['arquivo'];?>" width="150" class="img_noticias">
                               <?php
                             } ?>
                             <?php
                             if($rs_num_rows_imagem4 > 0) { ?>
                               <a href="#" onClick="fnImagemPopUp( 'Noticia' , 800 , 600 , 'dbimagens/<?=$rs_imagem4['arquivo'];?>' , 'Tela' );">
                               <img src="dbimagens/thumbnail/<?=$rs_imagem4['arquivo'];?>" width="150" class="img_noticias">
                               <?php
                             } ?>
                             <?php
                             if($rs_num_rows_imagem1 > 0 || $rs_num_rows_imagem2 > 0 || $rs_num_rows_imagem3 > 0 || $rs_num_rows_imagem4 > 0 ) { ?>
                               <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                               <?php
                             } ?>


                             <p align="left"><a href="noticias.php">
   		                <img src="imagens/mnu_voltar.jpg" alt="Anterior" border="0"/>
   		             </a></p>

                             <center style ="padding: 20px">
                               [ <a href=javascript:MM_openBrWindow("envie_amigo.php?id=<?php print $rs_dados['id'] ; ?>&id_secao=<?php print $rs_dados['idsecao'] ; ?>&pagina=<?php print $pagina; ?>","indiqueAmigo","width=440,height=400,scrollbars=no") >
                               <u>Indique a um Amigo</u></a> ]
                               [ <a href=javascript:MM_openBrWindow("imprimir.php?id=<?php print $rs_dados['id'] ; ?>&id_secao=<?php print $rs_dados['idsecao'] ; ?>","imprimir","width=637,height=500,scrollbars=yes") >
                               <u>Imprimir</u></a> ]
                             </center>

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

   <?php

} else {

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
                  <td width="775" height="586" align="center" valign="top"> <br>
                    <table width="90%" border="0" cellspacing="0" cellpadding="0" class="interna">
                      <tr>
                        <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                        <img src="imagens/img_seta.jpg"> Noticias
                        </p></div><br/>
                      </tr>
                      <tr>
                        <td>
                          <br><div class="texto_geral">
                          <p align="center" style="font: bold 25px Tahoma;">
                            <strong>
                              Notícia não encontrada
                            </strong><br><br><br><br>
                          </p>
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

  <?php

}

?>