<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 5;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
$default['tabela'] = 'tbarearestrita';
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$nome = trim(str_replace("'","",$_REQUEST['nome']));
$login = trim(str_replace("'","",$_REQUEST['login']));
$senha = trim(str_replace("'","",$_REQUEST['senha']));
$email = trim(str_replace("'","",$_REQUEST['email']));
$status	= trim(str_replace("'","",$_REQUEST['status']));
if($status != 'A'){ $status = 'I'; }
if(!is_numeric($var_id)){ $var_id = 0; $var_acao = 'I'; }
else{ $var_id = intval($var_id); }
If($var_acao == "A"){
	$rs_sql = 'UPDATE '.$default['tabela'].' SET nome = "'.$nome.'", login = "'.$login.'", senha = "'.$senha.'", email = "'.$email.'", status = "'.$status.'" WHERE id='.$var_id.'';
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro alterado com sucesso!";
}
If($var_acao == "I"){
	$rs_sql = 'INSERT INTO '.$default['tabela'].'(nome, login, senha, email) VALUES("'.$nome.'", "'.$login.'", "'.$senha.'", "'.$email.'")';
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
<script language="javascript">
	alert("<?php echo $msg_aviso;?>");
	document.location.href='index.php?pagina=<?php echo $var_pagina;?>&itens=<?php echo $var_itens;?>&ordem=<?php echo $var_ordem;?>&busca=<?php echo $var_busca;?>';
</script>