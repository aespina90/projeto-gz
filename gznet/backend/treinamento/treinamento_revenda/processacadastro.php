<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 4;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
$default['tabela'] = 'tbtipotreinamento';
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$var_status = rtrim(ltrim(str_replace("'","",$_REQUEST['status'])));
$var_nome = rtrim(ltrim(str_replace("'","",$_REQUEST['nome'])));
$var_datatreino = $_REQUEST['anopublicacao'].$_REQUEST['mespublicacao'].$_REQUEST['diapublicacao'].$_REQUEST['horapublicacao'].$_REQUEST['minutopublicacao']."00";
$var_conteudo = rtrim(ltrim(str_replace("'","",$_REQUEST['conteudo'])));
$var_dataCadastro = date("YmdHis");
if(!is_numeric($var_id)){ $var_id = 0; $var_acao = 'I'; }
else{ $var_id = intval($var_id); }
if($var_status == ""){ $var_status = "I"; }
If($var_acao == "A"){
	$rs_sql	= 'SELECT * FROM '.$default['tabela'].' WHERE id = "'.$var_id.'" AND tipo = "R"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	$rs_sql = "UPDATE ".$default['tabela']." SET nome = '".$var_nome."', datatreino = '".$var_datatreino."', conteudo = '".$var_conteudo."', status = '".$var_status."', datacadastro=datacadastro WHERE id = ".$var_id;
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro alterado com sucesso!";
}
If($var_acao == "I"){
	$rs_sql = "INSERT INTO ".$default['tabela']." (nome, tipo, datatreino, conteudo, status, datacadastro)
			   VALUES('".$var_nome."', 'R', '".$var_datatreino."', '".$var_conteudo."', '".$var_status."', NOW())";
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro incluído com sucesso!";
}
If($var_acao == "E"){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id = "'.$var_id.'" AND tipo = "R"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	$rs_sql = "DELETE FROM ".$default['tabela']." WHERE id = '".$var_id."' AND tipo = 'R'";
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro excluído com sucesso!";
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql,$default['nivel']);
?>
<script language="javascript">
	alert("<?php echo $msg_aviso;?>");
	document.location.href='index.php';
</script>