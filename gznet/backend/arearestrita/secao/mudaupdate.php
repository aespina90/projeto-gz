<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 5;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
$var_acao = ltrim(rtrim(str_replace("'","",$_REQUEST['acao'])));
$var_acao = substr(strtoupper($var_acao),0,1);
fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$var_id 	 = ltrim(rtrim(str_replace("'","",$_REQUEST['id'])));
$var_ordem 	 = ltrim(rtrim(str_replace("'","",$_REQUEST['ordem'])));
$var_busca 	 = ltrim(rtrim(str_replace("'","",$_REQUEST['busca'])));
$var_itens 	 = ltrim(rtrim(str_replace("'","",$_REQUEST['itens'])));
$var_atualizando = ltrim(rtrim(str_replace("'","",$_REQUEST['atualizando'])));
If($var_atualizando == "S"){
	$var_atualizando = "N";
}
Else{
	$var_atualizando = "S";
}
If(strlen($var_id) > 0 && is_numeric($var_id) == TRUE){
	$rs_sql = "UPDATE tbsecao SET atualizando = '".$var_atualizando."' WHERE id = ".$var_id."";
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
}
?>
<script>
	document.location.href='index.php';
</script>