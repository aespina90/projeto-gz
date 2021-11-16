<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 2;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);

$post['descricao'] = trim(str_replace("'","",$_REQUEST['descricao']));

if($var_acao == "A"){

   $rs_sql = "SELECT * FROM tbletteraimagens WHERE id = ".$var_id;
   $rs_query = mysql_query($rs_sql,$conexao['conexao']);
   $rs_dados = mysql_fetch_array($rs_query);
   if(($rs_dados['arquivo'] != '')&&(is_file($folders['dbimagens'].$rs_dados['arquivo']))){
       unlink($folders['dbimagens'].$rs_dados['arquivo']);
       unlink($folders['dbimagens'].'thumbnail/'.$rs_dados['arquivo']);
   }

   $rs_sql = "UPDATE tbletteraimagens SET ";
   $upload['campo'] = $_FILES['arquivo'];

   require($template['upl_img']);
   if (strlen($upload['nome']) > 0) {
      $rs_sql .= " arquivo='".$upload['nome']."', ";
      fun_gera_imagem_thumbnail($default['nivel'].'../dbimagens/'.$upload['nome'],$default['nivel'].'../dbimagens/thumbnail/'.$upload['nome'],150,150);
   }

   $rs_sql .= "descricao = '".$post['descricao']."', data_cadastro = '".date('YmdHis')."' WHERE id = ".$var_id;
   $rs_query = mysql_query($rs_sql,$conexao['conexao']);
   $var_msg = "Registro alterado com sucesso!";
}

if($var_acao == "I"){
   $upload['campo'] = $_FILES['arquivo'];
   if($_FILES['arquivo'] != '') {
      require($template['upl_img']);
      fun_gera_imagem_thumbnail($default['nivel'].'../dbimagens/'.$upload['nome'],$default['nivel'].'../dbimagens/thumbnail/'.$upload['nome'],150,150);
   }
   $rs_sql = "INSERT INTO tbletteraimagens (arquivo, descricao) VALUES('".$upload['nome']."', '".$post['descricao']."')";
   $rs_query = mysql_query($rs_sql,$conexao['conexao'])or die(mysql_error());
   $var_msg = "Registro incluído com sucesso!";
}

if($var_acao == "E"){
   $rs_sql = "SELECT * FROM tbletteraimagens WHERE id = ".$var_id;
   $rs_query = mysql_query($rs_sql,$conexao['conexao']);
   $rs_dados = mysql_fetch_array($rs_query);
   if(($rs_dados['arquivo'] != '')&&(is_file($folders['dbimagens'].$rs_dados['arquivo']))){
   	unlink($folders['dbimagens'].$rs_dados['arquivo']);
   	unlink($folders['dbimagens'].'thumbnail/'.$rs_dados['arquivo']);
   }
   $rs_sql = "DELETE FROM tbletteraimagens WHERE id = ".$var_id;
   $rs_query = mysql_query($rs_sql,$conexao['conexao']);
   $var_msg = "Registro excluído com sucesso!";
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql,$default['nivel']);
?>
<script type="text/javascript">
	alert ("<?php echo $var_msg;?>");
	document.location.href = "index.php";
</script>