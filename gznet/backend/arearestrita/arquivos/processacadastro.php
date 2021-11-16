<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 5;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
$default['tabela'] = 'tbarquivos';
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$sub_secao      = trim(str_replace("'","",$_REQUEST['sub_secao']));
$nome           = trim(str_replace("'","",$_REQUEST['nome']));
$arquivo        = trim(str_replace("'","",$_REQUEST['arquivo']));
$status         = trim(str_replace("'","",$_REQUEST['status']));
$datacadastro   = date("YmdHis");
$var_itens      = 1000;
if($status != 'A'){ $status = 'I'; }
if(!is_numeric($var_id)){ $var_id = 0; $var_acao = 'I'; }
else{ $var_id = intval($var_id); }
If($var_acao == "A"){
	$rs_sql = 'UPDATE '.$default['tabela'].' SET sub_secao = '.$sub_secao.', nome = "'.$nome.'", arquivo = "'.$arquivo.'", status = "'.$status.'" WHERE id='.$var_id.'';
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error().'<br/>'.$rs_sql);
	$msg_aviso = "Registro alterado com sucesso!";
}
If($var_acao == "I"){
	$rs_sql = 'INSERT INTO '.$default['tabela'].'(sub_secao, nome, arquivo, datacadastro, status) VALUES('.$sub_secao.', "'.$nome.'", "'.$arquivo.'", NOW(), "A")';
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
	$msg_aviso = "Registro incluído com sucesso!";
}
If($var_acao == "E"){
	if(($rs_dados['arquivo'] != '')&&(is_file($folders['arquivos'].$rs_dados['arquivo']))){
        unlink($folders['arquivos'].$rs_dados['arquivo']);
    }
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