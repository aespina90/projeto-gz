<?php
session_start();
$default['nivel'] = '../';
$default['modulo'] = 6;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
$default['tabela'] = 'tbparceiros';
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$status = rtrim(ltrim(str_replace("'","",$_REQUEST['status'])));
$logo = rtrim(ltrim(str_replace("'","",$_REQUEST['id_imagem'])));
$nome = rtrim(ltrim(str_replace("'","",$_REQUEST['nome'])));
$url = rtrim(ltrim(str_replace("'","",$_REQUEST['url'])));
$datacadastro = date("YmdHis");
if($logo == ''){ $logo = 0; }
if(!is_numeric($var_id)){ $var_id = 0; $var_acao = 'I'; }
else{ $var_id = intval($var_id); }
if($status == ""){ $status = "I"; }
If($var_acao == "A"){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id="'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	$rs_sql = " UPDATE ".$default['tabela']." SET nome = '".$nome."', url = '".$url."', datacadastro=datacadastro, status = '".$status."', logo = '".$logo."' WHERE id = ".$var_id;
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error().'<br/>'.$rs_sql);
	$msg_aviso = "Registro alterado com sucesso!";
}
If($var_acao == "I"){
	$rs_sql = " INSERT INTO ".$default['tabela']."(nome, url, datacadastro, status, logo)VALUES('".$nome."', '".$url."', '".$datacadastro."', '".$status."', '".$logo."')";
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error().'<br/>'.$rs_sql);
	$msg_aviso = "Registro incluído com sucesso!";
}
If($var_acao == "E"){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id="'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	$rs_sql = "DELETE FROM ".$default['tabela']. " WHERE id = ".$var_id ;
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error().'<br/>'.$rs_sql);
	$msg_aviso = "Registro excluído com sucesso!";
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql,$default['nivel']);
?>
<script language="javascript">
	alert("<?php echo $msg_aviso;?>");
	document.location.href='index.php';
</script>