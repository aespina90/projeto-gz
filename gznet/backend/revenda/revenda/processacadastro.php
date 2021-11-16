<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 3;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
$default['tabela'] = 'tbrevendas';
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$var_status             = rtrim(ltrim(str_replace("'","",$_REQUEST['status'])));
$var_logo               = rtrim(ltrim(str_replace("'","",$_REQUEST['logo'])));
$var_nomefantasia       = rtrim(ltrim(str_replace("'","",$_REQUEST['nome_fantasia'])));
$var_cidade             = rtrim(ltrim(str_replace("'","",$_REQUEST['cidade'])));
$var_estado             = rtrim(ltrim(str_replace("'","",$_REQUEST['estado'])));
$var_nome               = rtrim(ltrim(str_replace("'","",$_REQUEST['nome'])));
$var_email              = rtrim(ltrim(str_replace("'","",$_REQUEST['email'])));
$var_site               = rtrim(ltrim(str_replace("'","",$_REQUEST['site'])));
$var_telefone           = rtrim(ltrim(str_replace("'","",$_REQUEST['telefone'])));
$var_dataCadastro       = date("YmdHis");
if(!is_numeric($var_id)){ $var_id = 0; $var_acao = 'I'; }
else{ $var_id = intval($var_id); }
if($var_status == ""){ $var_status = "I"; }
If($var_acao == "A"){
	$rs_sql	= 'SELECT * FROM '.$default['tabela'].' WHERE id="'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	$rs_sql = "UPDATE ".$default['tabela']." SET logo = '".$var_logo."', nome_fantasia = '".$var_nomefantasia."', cidade = '".$var_cidade."', estado = '".$var_estado."', nome = '".$var_nome."', email = '".$var_email."', site = '".$var_site."', status = '".$var_status."', telefone = '".$var_telefone."', datacadastro=datacadastro WHERE id = '".$var_id."'";
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro alterado com sucesso!";
}
If($var_acao == "I"){
	$rs_sql = "INSERT INTO ".$default['tabela']." (logo, nome_fantasia, cidade, estado, nome, email, site, status, telefone, datacadastro)
			   VALUES('".$var_logo."', '".$var_nomefantasia."', '".$var_cidade."', '".$var_estado."', '". $var_nome."', '".$var_email."', '".$var_site."', '".$var_status."', '".$var_telefone."', NOW())";
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro incluído com sucesso!";
}
If($var_acao == "E"){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id="'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	$rs_sql = "DELETE FROM ".$default['tabela']." WHERE id = ".$var_id;
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro excluído com sucesso!";
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql,$default['nivel']);
?>
<script language="javascript">
	alert("<?php echo $msg_aviso;?>");
	document.location.href='index.php';
</script>