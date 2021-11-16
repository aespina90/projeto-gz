<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');
$id     = $_REQUEST['id'];
$tipo   = $_REQUEST['tipo'];

$id     = ereg_replace("[^0-9.]", "",$id);
$tipo   = substr($tipo,0,1);

$sql    = 'SELECT * FROM tbtipotreinamento WHERE id = "'.$id.'" AND tipo = "'.$tipo.'" AND status = "A" ORDER BY datatreino DESC';
$query  = mysql_query($sql,$conexao['conexao'])or die(mysql_error());
$linhas = mysql_num_rows($query);

if($linhas > 0){ $dados = mysql_fetch_array($query); }

?>
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<style>*{ font-family:verdana; font-size:10px; color:#000; }</style>
</head>
<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" bgcolor="#FFFFFF">
<div align="justify" style="padding:0 10px 0 10px;" id="centro">
	<p><b><br/><?php echo $dados['nome'];?> - <?php echo fun_tratamento_data($dados['datatreino'],'L');?></b></p><br/>
	<p><textarea name="conteudo" id="conteudo" rows="6" cols="65"><?php echo $dados['conteudo'];?></textarea></p>
</div>
</body>
</html>