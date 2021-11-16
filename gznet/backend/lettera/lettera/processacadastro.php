<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 2;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
$default['tabela'] = 'tblettera';
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$var_secao = trim(str_replace("'","",$_REQUEST['idsecao']));
$var_assunto = rtrim(ltrim(str_replace("'","",$_REQUEST['assunto'])));
$var_lead = rtrim(ltrim(str_replace("'","",$_REQUEST['lead'])));
$var_materia = rtrim(ltrim(str_replace("'","",$_REQUEST['materia'])));
$var_fonte = rtrim(ltrim(str_replace("'","",$_REQUEST['fonte'])));
$var_fontelink = rtrim(ltrim(str_replace("'","",$_REQUEST['fontelink'])));
$var_DataPublicacao = $_REQUEST['anopublicacao'].$_REQUEST['mespublicacao'].$_REQUEST['diapublicacao'].$_REQUEST['horapublicacao'].$_REQUEST['minutopublicacao']."00";
$var_DataExpiracao = $_REQUEST['anoexpiracao'].$_REQUEST['mesexpiracao'].$_REQUEST['diaexpiracao'].$_REQUEST['horaexpiracao'].$_REQUEST['minutoexpiracao']."00";
$var_DataCadastro = date("YmdHis");
$var_status = rtrim(ltrim(str_replace("'","",$_REQUEST['status'])));
$var_expirar = rtrim(ltrim(str_replace("'","",$_REQUEST['expirar'])));
$var_idimagem = rtrim(ltrim(str_replace("'","",$_REQUEST['id_imagem'])));
$var_idimagem1 = rtrim(ltrim(str_replace("'","",$_REQUEST['id_imgnew1'])));
$var_idimagem2 = rtrim(ltrim(str_replace("'","",$_REQUEST['id_imgnew2'])));
$var_idimagem3 = rtrim(ltrim(str_replace("'","",$_REQUEST['id_imgnew3'])));
$var_idimagem4 = rtrim(ltrim(str_replace("'","",$_REQUEST['id_imgnew4'])));
$var_pagabertura = rtrim(ltrim(str_replace("'","",$_REQUEST['pagabertura'])));

if($var_idimagem == '') { $var_idimagem  = 0; }
if($var_idimagem1 == ''){ $var_idimagem1 = 0; }
if($var_idimagem2 == ''){ $var_idimagem2 = 0; }
if($var_idimagem3 == ''){ $var_idimagem3 = 0; }
if($var_idimagem4 == ''){ $var_idimagem4 = 0; }
$var_idalbum = rtrim(ltrim(str_replace("'","",$_REQUEST['id_album'])));
if($var_idalbum == ''){ $var_idalbum = 0; }
if(!is_numeric($var_id)){ $var_id = 0; $var_acao = 'I'; }
else{ $var_id = intval($var_id); }
if($var_status == ""){ $var_status = "I"; }
if($var_expirar == ""){ $var_expirar = "N"; }
if($var_pagabertura == ""){ $var_pagabertura = "N"; }

If($var_acao == "A"){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id="'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	$rs_sql = " UPDATE ".$default['tabela']." SET idsecao = '".$var_secao."', datacadastro=datacadastro, datapublicacao = '".$var_DataPublicacao."',
				dataexpiracao = '".$var_DataExpiracao."', assunto = '".$var_assunto."', lead = '".$var_lead."', materia = '".$var_materia."',
				fonte = '".$var_fonte."', fontelink = '".$var_fontelink."', idusuario = '".$_SESSION[$session['iduser']]."', pagabertura = '".$var_pagabertura."',
				status = '".$var_status."', expirar = '".$var_expirar."', idimagem = '".$var_idimagem."', idimagemnoticia1 = '".$var_idimagem1."', idimagemnoticia2 = '".$var_idimagem2."', idimagemnoticia3 = '".$var_idimagem3."', idimagemnoticia4 = '".$var_idimagem4."', idalbum = '".$var_idalbum."' WHERE id = ".$var_id;
	$rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error().'<br/>'.$rs_sql);
	$msg_aviso = "Registro alterado com sucesso!";
}
If($var_acao == "I"){
	$rs_sql = " INSERT INTO ".$default['tabela']."(idsecao, datapublicacao, dataexpiracao, assunto, datacadastro, lead, materia, fonte, fontelink, idusuario, status, expirar, idimagem, idimagemnoticia1, idimagemnoticia2, idimagemnoticia3, idimagemnoticia4, idalbum, pagabertura)
				VALUES('".$var_secao."', '".$var_DataPublicacao."', '".$var_DataExpiracao."', '". $var_assunto."', '".$var_DataCadastro."', '".$var_lead."', '".$var_materia."', '".$var_fonte."', '".$var_fontelink."', '".$_SESSION[$session['iduser']]."', '".$var_status."', '".$var_expirar."', '".$var_idimagem."', '".$var_idimagem1."', '".$var_idimagem2."', '".$var_idimagem3."', '".$var_idimagem4."', '".$var_idalbum."', '".$var_pagabertura."')";
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