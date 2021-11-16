<?php
session_start();
require ('inc_conexao_interno.php');
require ('inc_funcoes.php');

//recupera a pagina
$var_pagina = '';

if ( ISSET($_REQUEST['pagina']) )
    $var_pagina = $_REQUEST['pagina'];

//numero de itens
$var_itens = 1000 ;

//id da seção
$id_secao = 1 ;

//recupera noticia
$rs_sql = 'SELECT * FROM tblettera
	   WHERE idsecao = ' .$id_secao. ' AND status = "A" AND ( datapublicacao < NOW() AND ( dataexpiracao > NOW() OR expirar = "N" ) )
           ORDER BY datapublicacao DESC, assunto ASC';

$rs_query    = mysql_query ($rs_sql);
$rs_num_rows = mysql_num_rows ($rs_query);

// Grava o número de páginas por itens
$var_totalpaginas = ceil ( $rs_num_rows / $var_itens ) ;

// Verifica o número da página
if (( $var_pagina == '' ) or ( intval ( $var_pagina ) < 1 )) {
   // Reseta o número da página
   $var_pagina = 1 ;
   // Reseta o marcador de registro
   $num_inicio = 0 ;
} else {
   if ( intval ( $var_pagina ) > $rs_num_rows ) {
      // Seta a página como a última
      $var_pagina = $rs_num_rows ;
      // Seta o marcador de registros para os últimos n itens
      $num_inicio = ( $var_pagina - 1 ) * $var_itens ;
   } else {
      // Seta o marcador de registro para os itens da página atual
      $num_inicio = ( $var_pagina - 1 ) * $var_itens ;
   }
}

// recupera as noticias de acordo com a paginação
$rs_sql = 'SELECT * FROM tblettera
           WHERE idsecao = ' .$id_secao. ' AND status = "A" AND ( datapublicacao < NOW() AND ( dataexpiracao > NOW() OR expirar = "N" ) )
           ORDER BY datapublicacao DESC, assunto ASC
           LIMIT '.$num_inicio.', '. $var_itens ;

$rs_query    = mysql_query ( $rs_sql , $conexao['conexao'] ) or die (mysql_error());
$rs_num_rows = mysql_num_rows ( $rs_query ) ;

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
 <script type="text/javascript" src="js/jquery.min.js"></script>
<script language="JavaScript">

function mostra(campo){
    document.getElementById(campo).style.display='' ;
}
function oculta(campo){
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
                <td width="775" height="800" align="center" valign="top"> <br>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> Noticias
                      </p></div><br/>
                    </tr>
                    <?php
                    for ($cont =0;$cont < $rs_num_rows;$cont++) {
                        $rs_dados        = mysql_fetch_array($rs_query);
                        $rs_sql_imagem   = 'SELECT * FROM tbletteraimagens WHERE id="'.$rs_dados['idimagem'].'"';
                        $rs_query_imagem = mysql_query($rs_sql_imagem);
                        $rs_linhas       = mysql_num_rows($rs_query_imagem);
                        $rs_imagem = mysql_fetch_array($rs_query_imagem);       ?>
			<tr>
                          <td height="105">
                            <br>
                            <div class="texto_geral_titulo"><a href="noticias_interno.php?id=<?php echo $rs_dados['id'];?>&id_secao=<?php echo $rs_dados['idsecao'];?>"><?php echo $rs_dados['assunto'];?></a></div>
                            <div class="texto_geral">
			      <br>
                              <?php
                              if ($rs_linhas > 0) { ?>
                                 <a href="noticias_interno.php?id=<?php echo $rs_dados['id'];?>&id_secao=<?php echo $rs_dados['idsecao'];?>"><img src="dbimagens/thumbnail/<?php echo $rs_imagem['arquivo'];?>" class="img_noticias"></a>       <?php
                              } ?>
                            </div>
                          </td>
                        </tr>
                        <?php
                        if ($cont +1 != $rs_num_rows) { ?>
                           <td><hr></td>        <?php
			}
                    } ?>

                    <tr>
                      <td class="texto_geral" style="padding-top:20px;"><center>
                        <?php
                        if ( $var_totalpaginas > 1 ) {
                           // Paginação
                           print fun_paginacao ( $var_pagina , $var_totalpaginas , 'navegacao' , 2 , $var_itens , $var_ordem , $var_busca) ;
                        }       ?>
                      </center></td>
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

<map name="Map">
  <area shape="rect" coords="674,27,764,49" href="http://www.logicadigital.com.br" target="_blank">
</map>
<map name="Map2">
  <area shape="rect" coords="7,19,52,60" href="#">
  <area shape="rect" coords="71,21,141,58" href="#">
  <area shape="rect" coords="153,11,218,66" href="#">
</map>
<map name="Map3">
  <area shape="rect" coords="35,9,225,163" href="index.php">
</map>
</body>
</html>
