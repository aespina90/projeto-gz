<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 5;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
$default['tabela'] = 'tbsecao';
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$categoria      = trim(str_replace("'","",$_REQUEST['categoria']));
$secao          = trim(str_replace("'","",$_REQUEST['secao']));
$obs            = trim(str_replace("'","",$_REQUEST['obs']));
$status         = trim(str_replace("'","",$_REQUEST['status']));
$atualizando    = trim(str_replace("'","",$_REQUEST['atualizando']));
if($status != 'A'){ $status = 'I'; }
if($atualizando != 'S'){ $atualizando = 'N'; }
if(!is_numeric($var_id)){ $var_id = 0; $var_acao = 'I'; }
else{ $var_id = intval($var_id); }
If($var_acao == "A"){
	$rs_sql = 'UPDATE '.$default['tabela'].' SET categoria = "'.$categoria.'", secao = "'.$secao.'", obs = "'.$obs.'", status = "'.$status.'", atualizando = "'.$atualizando.'" WHERE id='.$var_id.'';
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro alterado com sucesso!";
}
If($var_acao == "I"){
	$rs_sql = 'INSERT INTO '.$default['tabela'].'(categoria, secao, obs, status) VALUES("'.$categoria.'", "'.$secao.'", "'.$obs.'", "A")';
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro incluído com sucesso!";
}
If($var_acao == "E"){
	$rs_sql = "DELETE FROM ".$default['tabela']." WHERE id = ".$var_id;
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro excluído com sucesso!";
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql);
?>
<script type="text/javascript">
	alert("<?php echo $msg_aviso;?>");
	document.location.href='index.php?pagina=<?php echo $var_pagina;?>&itens=<?php echo $var_itens;?>&ordem=<?php echo $var_ordem;?>&busca=<?php echo $var_busca;?>';
</script>