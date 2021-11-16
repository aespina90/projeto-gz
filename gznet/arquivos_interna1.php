<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');
include("identify.php");

$id     = $_SESSION['iduser'];
$secao  = $_REQUEST['secao'];
$obs    = $_REQUEST['obs'];
$nome   = $_REQUEST['nome_secao'];

$browser = Check_Browser();
$os      = Check_OS();

$id     = ereg_replace("[^0-9.]", "",$id);
$secao  = ereg_replace("[^0-9.]", "",$secao);

if ( $id == '' )        header('location: index.php');
if ( $secao == '' )     header('location: index.php');
if ( $nome == '' )      header('location: index.php');

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 06 Jan 1990 00:00:01 GMT"); 

function size_readable ($size, $retstring = null) {
	$sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
	if ($retstring === null){ $retstring = '%01.2f %s'; }
	$lastsizestring = end($sizes);
	foreach ($sizes as $sizestring){
		if($size < 1024){ break; }
		if($sizestring != $lastsizestring){ $size /= 1024; }
	}
	if($sizestring == $sizes[0]){ $retstring = '%01d %s'; }
	return sprintf($retstring, $size, $sizestring);
}

function time_readable ($time, $retstring = null) {
        $retstring = substr($time,5,-4);
        $month     = strtolower(substr($retstring,3,3));
        if($month == "jan") $month="01";
        if($month == "feb") $month="02";
        if($month == "mar") $month="03";
        if($month == "apr") $month="04";
        if($month == "may") $month="05";
        if($month == "jun") $month="06";
        if($month == "jul") $month="07";
        if($month == "aug") $month="08";
        if($month == "sep") $month="09";
        if($month == "oct") $month="10";
        if($month == "nov") $month="11";
        if($month == "dec") $month="12";
        $retstring = substr($retstring,0,2).'/'.$month.'/'.substr($retstring,7,4).'  '.substr($retstring,11);
	return $retstring;
}

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
<script src="js/jquery-1.1.3.1.pack.js" type="text/javascript"></script> 
<script src="js/thickbox-compressed.js" type="text/javascript"></script> 
<link rel="stylesheet" href="thickbox.css" type="text/css" media="screen" />
</head>
<body>
<div id="hiddenModalContent" style="display:none"> 
	<p>
<img src="instrucao.jpg">
	</p> 
	<p style="text-align:center"><input type="submit" value="&nbsp;&nbsp;Fechar&nbsp;&nbsp;" onclick="tb_remove()" /></p> 
</div> 
<?php
	if ($secao == 23 || $secao == 24){echo "
	<script>
$(document).ready(function(){
    tb_show('Splash','#TB_inline?height=500&width=600&inlineId=hiddenModalContent&modal=true', null);
});
</script>	
	";}
?>
<!--inicio da tabela geral-->
<form id="arquivos_interna" method="post" action="logdownload.php" name="arquivos_interna">
<input type="hidden" id="idfile" name="idfile" />
<input type="hidden" id="iduser" name="iduser" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
  <tr>
    <td align="center" valign="top">
      <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="center" valign="top">
            <?php include("inc_topo.php"); ?>
            <table width="775" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="775" height="586" align="center" valign="top"><br/>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> GZ Net
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105"><div class="texto_geral"><br>

                        <?php
                        echo '<p style="margin-top:10px;font: bold 20px Tahoma ;"><b><strong>';
                        print $nome;
                        echo '</b></strong></p>';

                        if($obs !='') {
                          echo '<p style="margin-top:10px;"><b>';
                          print $obs;
                          echo '</b></p>';
                        } ?>

                        <p style="margin-top:10px;"><br>
                        Qualquer dúvida ou problema, entre em contato conosco através do email <a href="mailto:suporte@gzsistemas.com.br">suporte@gzsistemas.com.br</a>.</p><br/>

                        <p align="left">
		          <a href="arquivos.php">
		            <img src="imagens/mnu_voltar.jpg" alt="Anterior" border="0"/>
		          </a>
                        </p>

                        <br/>

                        <?php
                        $sql_secao      = 'SELECT * FROM tbsubsecao WHERE status = "A" AND secao = '.$secao.' ORDER BY id';
                        $query_secao    = mysql_query($sql_secao,$conexao['conexao'])or die(mysql_error());
                        $linhas_secao   = mysql_num_rows($query_secao);

                        if($linhas_secao > 0) {
                           for($s=0; $s<$linhas_secao; $s++){
                              $dados_secao      = mysql_fetch_array($query_secao);
                              $sql_arquivo      = 'SELECT * FROM tbarquivos WHERE status = "A" AND sub_secao = "'.$dados_secao['id'].'" ORDER BY id';
                              $query_arquivo    = mysql_query($sql_arquivo,$conexao['conexao'])or die(mysql_error());
                              $linhas_arquivo   = mysql_num_rows($query_arquivo);  ?>
                                <p><strong><?php echo $dados_secao['sub_secao'];?></strong></p>  <?php
                              if($linhas_arquivo > 0) { ?>
                                <table width="90%" border="0" cellspacing="1" cellpadding="3" bgcolor="#CCCCCC">
                                  <tr bgcolor="#EBEBEB" class="texto_geral">
                                    <td>Nome</td>
                                    <td>Arquivo</td>
                                    <td align="center">Data/Hora</td>
                                    <td align="center">Tamanho</td>
                                  </tr> <?php

                                ini_set("allow_url_fopen", 1);

                                for($a=0; $a<$linhas_arquivo; $a++) {
                                   $dados_arquivo = mysql_fetch_array($query_arquivo);
                                   $arquivo       = "/home/gzsistemas/www/gzsistemas.com.br/downloads/".$dados_secao['pasta']."/".$dados_arquivo['arquivo'];
                                   $dnarquivo     = "http://www.gzsistemas.com.br/downloads/".$dados_secao['pasta']."/".$dados_arquivo['arquivo'];
                                   $filesize      = size_readable(filesize($arquivo));
                                   $filectime     = date("d/m/Y H:m", filemtime($arquivo));
                                   ?>
                                   <tr bgcolor="#FFFFFF" class="texto_geral" type="text" onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';">
                                     <td width="35%" align="left"><?php echo $dados_arquivo['nome'];?></td>
                                     <?php if ( strpos($dados_arquivo['arquivo'],".arj") != false && $browser=='Firefox' ) { ?>
                                        <td width="30%">
                                          Utilizar o <a href="http://windows.microsoft.com/pt-BR/internet-explorer/products/ie/home" target="_blank" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">Internet Explorer</a> ou <a href="http://www.google.com/chrome?hl=pt-BR" target="_blank" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">Google Chrome</a>
                                        </td>
                                     <?php } else { ?>
                                        <td width="30%"><b><u><p onClick="fnDownFile(<?php echo $id;?>,<?php echo $dados_arquivo['id'];?>,'<?php echo $dnarquivo;?>');" style="cursor:pointer;"><?php echo $dados_arquivo['arquivo'];?></p></b></u></td>
                                     <?php } ?>     
                                     <td width="20%" align="center"><?php echo $filectime;?></td>
                                     <td width="15%" align="center"><?php echo $filesize;?></td>
                                   </tr>  <?php
			        }

			        ini_set("allow_url_fopen", 0);

				print '</table><br/>';
                              }
                           }
			} else {
			   print 'Nenhum arquivo no momento.';
			} ?>

                        <p align="left">
		          <a href="arquivos.php">
		            <img src="imagens/mnu_voltar.jpg" alt="Anterior" border="0"/>
		          </a>
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